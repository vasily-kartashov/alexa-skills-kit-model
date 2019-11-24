<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class ComponentVisibleOnScreenListItemTagBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $index = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param int $index
     * @return self
     */
    public function withIndex(int $index): self
    {
        $this->index = $index;
        return $this;
    }

    public function build(): ComponentVisibleOnScreenListItemTag
    {
        return ($this->constructor)(
            $this->index
        );
    }
}
