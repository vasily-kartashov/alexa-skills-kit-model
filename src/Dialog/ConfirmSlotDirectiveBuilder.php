<?php

namespace Alexa\Model\Dialog;

use Alexa\Model\Directive;
use Alexa\Model\Intent;

abstract class ConfirmSlotDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Intent|null */
    private $updatedIntent = null;

    /** @var string|null */
    private $slotToConfirm = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withUpdatedIntent(Intent $updatedIntent): self
    {
        $this->updatedIntent = $updatedIntent;
        return $this;
    }

    public function withSlotToConfirm(string $slotToConfirm): self
    {
        $this->slotToConfirm = $slotToConfirm;
        return $this;
    }

    public function build(): ConfirmSlotDirective
    {
        return ($this->constructor)(
            $this->updatedIntent,
            $this->slotToConfirm
        );
    }
}
