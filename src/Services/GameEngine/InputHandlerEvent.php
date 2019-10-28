<?php

namespace Alexa\Model\Services\GameEngine;

use \JsonSerializable;

final class InputHandlerEvent implements JsonSerializable
{
    /** @var string|null */
    private $name = null;

    /** @var InputEvent[] */
    private $inputEvents = [];

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return InputEvent[]
     */
    public function inputEvents()
    {
        return $this->inputEvents;
    }

    public static function builder(): InputHandlerEventBuilder
    {
        $instance = new self;
        $constructor = function ($name, $inputEvents) use ($instance): InputHandlerEvent {
            $instance->name = $name;
            $instance->inputEvents = $inputEvents;
            return $instance;
        };
        return new class($constructor) extends InputHandlerEventBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param string $name
     * @return self
     */
    public static function ofName(string $name): InputHandlerEvent
    {
        $instance = new self;
        $instance->name = $name;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->name = isset($data['name']) ? ((string) $data['name']) : null;
        $instance->inputEvents = [];
        if (isset($data['inputEvents'])) {
            foreach ($data['inputEvents'] as $item) {
                $element = isset($item) ? InputEvent::fromValue($item) : null;
                if ($element !== null) {
                    $instance->inputEvents[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'inputEvents' => $this->inputEvents
        ]);
    }
}
