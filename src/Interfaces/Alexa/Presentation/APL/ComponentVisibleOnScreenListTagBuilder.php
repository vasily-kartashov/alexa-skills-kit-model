<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class ComponentVisibleOnScreenListTagBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $itemCount = null;

    /** @var int|null */
    private $lowestIndexSeen = null;

    /** @var int|null */
    private $highestIndexSeen = null;

    /** @var int|null */
    private $lowestOrdinalSeen = null;

    /** @var int|null */
    private $highestOrdinalSeen = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param int $itemCount
     * @return self
     */
    public function withItemCount(int $itemCount): self
    {
        $this->itemCount = $itemCount;
        return $this;
    }

    /**
     * @param int $lowestIndexSeen
     * @return self
     */
    public function withLowestIndexSeen(int $lowestIndexSeen): self
    {
        $this->lowestIndexSeen = $lowestIndexSeen;
        return $this;
    }

    /**
     * @param int $highestIndexSeen
     * @return self
     */
    public function withHighestIndexSeen(int $highestIndexSeen): self
    {
        $this->highestIndexSeen = $highestIndexSeen;
        return $this;
    }

    /**
     * @param int $lowestOrdinalSeen
     * @return self
     */
    public function withLowestOrdinalSeen(int $lowestOrdinalSeen): self
    {
        $this->lowestOrdinalSeen = $lowestOrdinalSeen;
        return $this;
    }

    /**
     * @param int $highestOrdinalSeen
     * @return self
     */
    public function withHighestOrdinalSeen(int $highestOrdinalSeen): self
    {
        $this->highestOrdinalSeen = $highestOrdinalSeen;
        return $this;
    }

    public function build(): ComponentVisibleOnScreenListTag
    {
        return ($this->constructor)(
            $this->itemCount,
            $this->lowestIndexSeen,
            $this->highestIndexSeen,
            $this->lowestOrdinalSeen,
            $this->highestOrdinalSeen
        );
    }
}
