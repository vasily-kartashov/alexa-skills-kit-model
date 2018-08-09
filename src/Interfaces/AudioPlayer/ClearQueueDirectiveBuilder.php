<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use Alexa\Model\Directive;

abstract class ClearQueueDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ClearBehavior|null */
    private $clearBehavior = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

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
