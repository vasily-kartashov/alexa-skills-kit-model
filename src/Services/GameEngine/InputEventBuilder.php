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

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $gadgetId
     * @return self
     */
    public function withGadgetId(string $gadgetId): self
    {
        $this->gadgetId = $gadgetId;
        return $this;
    }

    /**
     * @param string $timestamp
     * @return self
     */
    public function withTimestamp(string $timestamp): self
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @param InputEventActionType $action
     * @return self
     */
    public function withAction(InputEventActionType $action): self
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @param string $color
     * @return self
     */
    public function withColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param string $feature
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
