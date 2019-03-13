<?php

namespace Alexa\Model\CanFulfill;

abstract class CanFulfillSlotBuilder
{
    /** @var callable */
    private $constructor;

    /** @var CanUnderstandSlotValues|null */
    private $canUnderstand = null;

    /** @var CanFulfillSlotValues|null */
    private $canFulfill = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $canUnderstand
     * @return self
     */
    public function withCanUnderstand(CanUnderstandSlotValues $canUnderstand): self
    {
        $this->canUnderstand = $canUnderstand;
        return $this;
    }

    /**
     * @param mixed $canFulfill
     * @return self
     */
    public function withCanFulfill(CanFulfillSlotValues $canFulfill): self
    {
        $this->canFulfill = $canFulfill;
        return $this;
    }

    public function build(): CanFulfillSlot
    {
        return ($this->constructor)(
            $this->canUnderstand,
            $this->canFulfill
        );
    }
}
