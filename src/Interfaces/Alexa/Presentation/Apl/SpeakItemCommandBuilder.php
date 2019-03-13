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

    public function withAlign(Align $align): self
    {
        $this->align = $align;
        return $this;
    }

    public function withComponentId(string $componentId): self
    {
        $this->componentId = $componentId;
        return $this;
    }

    public function withHighlightMode(HighlightMode $highlightMode): self
    {
        $this->highlightMode = $highlightMode;
        return $this;
    }

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
