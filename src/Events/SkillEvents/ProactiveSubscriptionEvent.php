<?php

namespace Alexa\Model\Events\SkillEvents;

use JsonSerializable;

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
        $instance = new self;
        return new class($constructor = function ($eventName) use ($instance): ProactiveSubscriptionEvent {
            $instance->eventName = $eventName;
            return $instance;
        }) extends ProactiveSubscriptionEventBuilder {};
    }

    /**
     * @param string $eventName
     * @return self
     */
    public static function ofEventName(string $eventName): ProactiveSubscriptionEvent
    {
        $instance = new self;
        $instance->eventName = $eventName;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
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
