<?php

namespace Alexa\Model\Events\SkillEvents;

use \JsonSerializable;

final class ProactiveSubscriptionEvent implements JsonSerializable
{
    /** @var string|null */
    private $eventName = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function eventName()
    {
        return $this->eventName;
    }

    public static function builder(): ProactiveSubscriptionEventBuilder
    {
        $instance = new self();
        $constructor = function ($eventName) use ($instance): ProactiveSubscriptionEvent {
            $instance->eventName = $eventName;
            return $instance;
        };
        return new class($constructor) extends ProactiveSubscriptionEventBuilder
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
        $instance->eventName = isset($data['eventName']) ? ((string) $data['eventName']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'eventName' => $this->eventName
        ]);
    }
}
