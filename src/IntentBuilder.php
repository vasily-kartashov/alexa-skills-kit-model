<?php

namespace Alexa\Model;

abstract class IntentBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $name = null;

    /** @var Slot[] */
    private $slots = [];

    /** @var IntentConfirmationStatus|null */
    private $confirmationStatus = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $name
     * @return self
     */
    public function withName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param array $slots
     * @return self
     */
    public function withSlots(array $slots): self
    {
        foreach ($slots as $element) {
            assert($element instanceof Slot);
        }
        $this->slots = $slots;
        return $this;
    }

    /**
     * @param IntentConfirmationStatus $confirmationStatus
     * @return self
     */
    public function withConfirmationStatus(IntentConfirmationStatus $confirmationStatus): self
    {
        $this->confirmationStatus = $confirmationStatus;
        return $this;
    }

    public function build(): Intent
    {
        return ($this->constructor)(
            $this->name,
            $this->slots,
            $this->confirmationStatus
        );
    }
}
