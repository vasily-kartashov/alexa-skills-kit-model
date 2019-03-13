<?php

namespace Alexa\Model\Canfulfill;

abstract class CanFulfillIntentBuilder
{
    /** @var callable */
    private $constructor;

    /** @var CanFulfillIntentValues|null */
    private $canFulfill = null;

    /** @var CanFulfillSlot[] */
    private $slots = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withCanFulfill(CanFulfillIntentValues $canFulfill): self
    {
        $this->canFulfill = $canFulfill;
        return $this;
    }

    /**
     * @param CanFulfillSlot[] $slots
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
