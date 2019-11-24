<?php

namespace Alexa\Model\Events\SkillEvents;

abstract class ProactiveSubscriptionEventBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $eventName = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $eventName
     * @return self
     */
    public function withEventName(string $eventName): self
    {
        $this->eventName = $eventName;
        return $this;
    }

    public function build(): ProactiveSubscriptionEvent
    {
        return ($this->constructor)(
            $this->eventName
        );
    }
}
