<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

abstract class ClearQueueDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ClearBehavior|null */
    private $clearBehavior = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param ClearBehavior $clearBehavior
     * @return self
     */
    public function withClearBehavior(ClearBehavior $clearBehavior): self
    {
        $this->clearBehavior = $clearBehavior;
        return $this;
    }

    public function build(): ClearQueueDirective
    {
        return ($this->constructor)(
            $this->clearBehavior
        );
    }
}
