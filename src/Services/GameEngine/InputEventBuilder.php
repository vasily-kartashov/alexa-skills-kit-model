<?php

namespace Alexa\Model\Services\GameEngine;

abstract class InputEventBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $gadgetId = null;

    /** @var string|null */
    private $timestamp = null;

    /** @var InputEventActionType|null */
    private $action = null;

    /** @var string|null */
    private $color = null;

    /** @var string|null */
    private $feature = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $gadgetId
     * @return self
     */
    public function withGadgetId(string $gadgetId): self
    {
        $this->gadgetId = $gadgetId;
        return $this;
    }

    /**
     * @param mixed $timestamp
     * @return self
     */
    public function withTimestamp(string $timestamp): self
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @param mixed $action
     * @return self
     */
    public function withAction(InputEventActionType $action): self
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @param mixed $color
     * @return self
     */
    public function withColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param mixed $feature
     * @return self
     */
    public function withFeature(string $feature): self
    {
        $this->feature = $feature;
        return $this;
    }

    public function build(): InputEvent
    {
        return ($this->constructor)(
            $this->gadgetId,
            $this->timestamp,
            $this->action,
            $this->color,
            $this->feature
        );
    }
}
