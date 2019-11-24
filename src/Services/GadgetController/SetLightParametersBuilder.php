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

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param TriggerEventType $triggerEvent
     * @return self
     */
    public function withTriggerEvent(TriggerEventType $triggerEvent): self
    {
        $this->triggerEvent = $triggerEvent;
        return $this;
    }

    /**
     * @param int $triggerEventTimeMs
     * @return self
     */
    public function withTriggerEventTimeMs(int $triggerEventTimeMs): self
    {
        $this->triggerEventTimeMs = $triggerEventTimeMs;
        return $this;
    }

    /**
     * @param array $animations
     * @return self
     */
    public function withAnimations(array $animations): self
    {
        foreach ($animations as $element) {
            assert($element instanceof LightAnimation);
        }
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
