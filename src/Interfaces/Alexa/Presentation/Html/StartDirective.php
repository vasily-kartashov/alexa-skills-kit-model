<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

use Alexa\Model\Directive;
use \JsonSerializable;

final class StartDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Alexa.Presentation.HTML.Start';

    /** @var mixed|null */
    private $data = null;

    /** @var Transformer[] */
    private $transformers = [];

    /** @var StartRequest|null */
    private $request = null;

    /** @var ModelConfiguration|null */
    private $configuration = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return mixed|null
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * @return Transformer[]
     */
    public function transformers()
    {
        return $this->transformers;
    }

    /**
     * @return StartRequest|null
     */
    public function request()
    {
        return $this->request;
    }

    /**
     * @return ModelConfiguration|null
     */
    public function configuration()
    {
        return $this->configuration;
    }

    public static function builder(): StartDirectiveBuilder
    {
        $instance = new self;
        $constructor = function ($data, $transformers, $request, $configuration) use ($instance): StartDirective {
            $instance->data = $data;
            $instance->transformers = $transformers;
            $instance->request = $request;
            $instance->configuration = $configuration;
            return $instance;
        };
        return new class($constructor) extends StartDirectiveBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param mixed $data
     * @return self
     */
    public static function ofData($data): StartDirective
    {
        $instance = new self;
        $instance->data = $data;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->data = $data['data'];
        $instance->transformers = [];
        if (isset($data['transformers'])) {
            foreach ($data['transformers'] as $item) {
                $element = isset($item) ? Transformer::fromValue($item) : null;
                if ($element !== null) {
                    $instance->transformers[] = $element;
                }
            }
        }
        $instance->request = isset($data['request']) ? StartRequest::fromValue($data['request']) : null;
        $instance->configuration = isset($data['configuration']) ? ModelConfiguration::fromValue($data['configuration']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'data' => $this->data,
            'transformers' => $this->transformers,
            'request' => $this->request,
            'configuration' => $this->configuration
        ]);
    }
}
