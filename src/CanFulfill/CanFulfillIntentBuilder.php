<?php

namespace Alexa\Model\CanFulfill;

abstract class CanFulfillIntentBuilder
{
    /** @var callable */
    private $constructor;

    /** @var CanFulfillIntentValues|null */
    private $canFulfill = null;

    /** @var CanFulfillSlot[] */
    private $slots = [];

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param CanFulfillIntentValues $canFulfill
     * @return self
     */
    public function withCanFulfill(CanFulfillIntentValues $canFulfill): self
    {
        $this->canFulfill = $canFulfill;
        return $this;
    }

    /**
     * @param array $slots
     * @return self
     */
    public function withSlots(array $slots): self
    {
        foreach ($slots as $element) {
            assert($element instanceof CanFulfillSlot);
        }
        $this->slots = $slots;
        return $this;
    }

    public function build(): CanFulfillIntent
    {
        return ($this->constructor)(
            $this->canFulfill,
            $this->slots
        );
    }
}
