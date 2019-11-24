<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class SpeakListCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Align|null */
    private $align = null;

    /** @var string|null */
    private $componentId = null;

    /** @var string|null */
    private $count = null;

    /** @var string|null */
    private $minimumDwellTime = null;

    /** @var string|null */
    private $start = null;

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
     * @param string $count
     * @return self
     */
    public function withCount(string $count): self
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @param string $minimumDwellTime
     * @return self
     */
    public function withMinimumDwellTime(string $minimumDwellTime): self
    {
        $this->minimumDwellTime = $minimumDwellTime;
        return $this;
    }

    /**
     * @param string $start
     * @return self
     */
    public function withStart(string $start): self
    {
        $this->start = $start;
        return $this;
    }

    public function build(): SpeakListCommand
    {
        return ($this->constructor)(
            $this->align,
            $this->componentId,
            $this->count,
            $this->minimumDwellTime,
            $this->start
        );
    }
}
