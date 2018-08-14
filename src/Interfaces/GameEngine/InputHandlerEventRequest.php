<?php

namespace Alexa\Model\Interfaces\GameEngine;

use Alexa\Model\Request;
use Alexa\Model\Services\GameEngine\InputHandlerEvent;
use \JsonSerializable;

final class InputHandlerEventRequest extends Request implements JsonSerializable
{
    const TYPE = 'GameEngine.InputHandlerEvent';

    /** @var InputHandlerEvent[] */
    private $events = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return InputHandlerEvent[]
     */
    public function events()
    {
        return $this->events;
    }

    public static function builder(): InputHandlerEventRequestBuilder
    {
        $instance = new self();
        $constructor = function ($events) use ($instance): InputHandlerEventRequest {
            $instance->events = $events;
            return $instance;
        };
        return new class($constructor) extends InputHandlerEventRequestBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->type = self::TYPE;
        $instance->events = [];
        foreach ($data['events'] as $item) {
            $element = isset($item) ? InputHandlerEvent::fromValue($item) : null;
            if ($element) {
                $instance->events[] = $element;
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'events' => $this->events
        ]);
    }
}
