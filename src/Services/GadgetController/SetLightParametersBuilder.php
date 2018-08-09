<?php

namespace Alexa\Model\Services\GadgetController;

abstract class SetLightParametersBuilder
{
    /** @var callable */
    private $constructor;

    /** @var TriggerEventType|null */
    private $triggerEvent = null;

    /** @var int|null */
    private $triggerEventTimeMs = null;

    /** @var LightAnimation[] */
    private $animations = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withTriggerEvent(TriggerEventType $triggerEvent): self
    {
        $this->triggerEvent = $triggerEvent;
        return $this;
    }

    public function withTriggerEventTimeMs(int $triggerEventTimeMs): self
    {
        $this->triggerEventTimeMs = $triggerEventTimeMs;
        return $this;
    }

    /**
     * @param LightAnimation[] $animations
     * @return self
     */
    public function withAnimations(array $animations): self
    {
        $this->animations = $animations;
        return $this;
    }

    public function build(): SetLightParameters
    {
        return ($this->constructor)(
            $this->triggerEvent,
            $this->triggerEventTimeMs,
            $this->animations
        );
    }
}
