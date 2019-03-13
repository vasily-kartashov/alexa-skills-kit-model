<?php

namespace Alexa\Model\Dialog;

use Alexa\Model\Intent;

abstract class ElicitSlotDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Intent|null */
    private $updatedIntent = null;

    /** @var string|null */
    private $slotToElicit = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $updatedIntent
     * @return self
     */
    public function withUpdatedIntent(Intent $updatedIntent): self
    {
        $this->updatedIntent = $updatedIntent;
        return $this;
    }

    /**
     * @param mixed $slotToElicit
     * @return self
     */
    public function withSlotToElicit(string $slotToElicit): self
    {
        $this->slotToElicit = $slotToElicit;
        return $this;
    }

    public function build(): ElicitSlotDirective
    {
        return ($this->constructor)(
            $this->updatedIntent,
            $this->slotToElicit
        );
    }
}
