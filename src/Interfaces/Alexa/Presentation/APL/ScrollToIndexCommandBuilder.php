<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class ScrollToIndexCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Align|null */
    private $align = null;

    /** @var string|null */
    private $componentId = null;

    /** @var string|null */
    private $index = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Align $align
     * @return self
     */
    public function withAlign(Align $align): self
    {
        $this->align = $align;
        return $this;
    }

    /**
     * @param string $componentId
     * @return self
     */
    public function withComponentId(string $componentId): self
    {
        $this->componentId = $componentId;
        return $this;
    }

    /**
     * @param string $index
     * @return self
     */
    public function withIndex(string $index): self
    {
        $this->index = $index;
        return $this;
    }

    public function build(): ScrollToIndexCommand
    {
        return ($this->constructor)(
            $this->align,
            $this->componentId,
            $this->index
        );
    }
}
