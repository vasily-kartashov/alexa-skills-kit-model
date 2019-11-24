<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

use Alexa\Model\Directive;
use JsonSerializable;

final class HandleMessageDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Alexa.Presentation.HTML.HandleMessage';

    /** @var mixed|null */
    private $message = null;

    /** @var Transformer[] */
    private $transformers = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return mixed|null
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * @return Transformer[]
     */
    public function transformers()
    {
        return $this->transformers;
    }

    public static function builder(): HandleMessageDirectiveBuilder
    {
        $instance = new self;
        return new class($constructor = function ($message, $transformers) use ($instance): HandleMessageDirective {
            $instance->message = $message;
            $instance->transformers = $transformers;
            return $instance;
        }) extends HandleMessageDirectiveBuilder {};
    }

    /**
     * @param mixed $message
     * @return self
     */
    public static function ofMessage($message): HandleMessageDirective
    {
        $instance = new self;
        $instance->message = $message;
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
        $instance->message = $data['message'];
        $instance->transformers = [];
        if (isset($data['transformers'])) {
            foreach ($data['transformers'] as $item) {
                $element = isset($item) ? Transformer::fromValue($item) : null;
                if ($element !== null) {
                    $instance->transformers[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'message' => $this->message,
            'transformers' => $this->transformers
        ]);
    }
}
