<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Apl;

abstract class SpeakItemCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Align|null */
    private $align = null;

    /** @var string|null */
    private $componentId = null;

    /** @var HighlightMode|null */
    private $highlightMode = null;

    /** @var int|null */
    private $minimumDwellTime = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $align
     * @return self
     */
    public function withAlign(Align $align): self
    {
        $this->align = $align;
        return $this;
    }

    /**
     * @param mixed $componentId
     * @return self
     */
    public function withComponentId(string $componentId): self
    {
        $this->componentId = $componentId;
        return $this;
    }

    /**
     * @param mixed $highlightMode
     * @return self
     */
    public function withHighlightMode(HighlightMode $highlightMode): self
    {
        $this->highlightMode = $highlightMode;
        return $this;
    }

    /**
     * @param mixed $minimumDwellTime
     * @return self
     */
    public function withMinimumDwellTime(int $minimumDwellTime): self
    {
        $this->minimumDwellTime = $minimumDwellTime;
        return $this;
    }

    public function build(): SpeakItemCommand
    {
        return ($this->constructor)(
            $this->align,
            $this->componentId,
            $this->highlightMode,
            $this->minimumDwellTime
        );
    }
}
