<?php

namespace Alexa\Model\Services\GameEngine;

abstract class PatternBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string[] */
    private $gadgetIds = [];

    /** @var string[] */
    private $colors = [];

    /** @var InputEventActionType|null */
    private $action = null;

    /** @var int|null */
    private $repeat = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $gadgetIds
     * @return self
     */
    public function withGadgetIds(array $gadgetIds): self
    {
        foreach ($gadgetIds as $element) {
            assert(is_string($element));
        }
        $this->gadgetIds = $gadgetIds;
        return $this;
    }

    /**
     * @param array $colors
     * @return self
     */
    public function withColors(array $colors): self
    {
        foreach ($colors as $element) {
            assert(is_string($element));
        }
        $this->colors = $colors;
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
     * @param int $repeat
     * @return self
     */
    public function withRepeat(int $repeat): self
    {
        $this->repeat = $repeat;
        return $this;
    }

    public function build(): Pattern
    {
        return ($this->constructor)(
            $this->gadgetIds,
            $this->colors,
            $this->action,
            $this->repeat
        );
    }
}
