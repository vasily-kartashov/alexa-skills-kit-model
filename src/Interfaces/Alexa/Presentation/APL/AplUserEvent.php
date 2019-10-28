<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use Alexa\Model\Request;
use \JsonSerializable;

final class AplUserEvent extends Request implements JsonSerializable
{
    const TYPE = 'Alexa.Presentation.APL.UserEvent';

    /** @var string|null */
    private $token = null;

    /** @var array */
    private $arguments = [];

    /** @var mixed|null */
    private $source = null;

    /** @var mixed|null */
    private $components = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function token()
    {
        return $this->token;
    }

    /**
     * @return array
     */
    public function arguments()
    {
        return $this->arguments;
    }

    /**
     * @return mixed|null
     */
    public function source()
    {
        return $this->source;
    }

    /**
     * @return mixed|null
     */
    public function components()
    {
        return $this->components;
    }

    public static function builder(): AplUserEventBuilder
    {
        $instance = new self();
        $constructor = function ($token, $arguments, $source, $components) use ($instance): AplUserEvent {
            $instance->token = $token;
            $instance->arguments = $arguments;
            $instance->source = $source;
            $instance->components = $components;
            return $instance;
        };
        return new class($constructor) extends AplUserEventBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->type = self::TYPE;
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        $instance->arguments = [];
        if (isset($data['arguments'])) {
            foreach ($data['arguments'] as $item) {
                $element = $item;
                if ($element !== null) {
                    $instance->arguments[] = $element;
                }
            }
        }
        $instance->source = $data['source'];
        $instance->components = $data['components'];
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'token' => $this->token,
            'arguments' => $this->arguments,
            'source' => $this->source,
            'components' => $this->components
        ]);
    }
}
