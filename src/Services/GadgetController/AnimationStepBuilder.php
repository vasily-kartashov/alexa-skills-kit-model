<?php

namespace Alexa\Model\Services\GadgetController;

abstract class AnimationStepBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $durationMs = null;

    /** @var string|null */
    private $color = null;

    /** @var bool|null */
    private $blend = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $durationMs
     * @return self
     */
    public function withDurationMs(int $durationMs): self
    {
        $this->durationMs = $durationMs;
        return $this;
    }

    /**
     * @param mixed $color
     * @return self
     */
    public function withColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param mixed $blend
     * @return self
     */
    public function withBlend(bool $blend): self
    {
        $this->blend = $blend;
        return $this;
    }

    public function build(): AnimationStep
    {
        return ($this->constructor)(
            $this->durationMs,
            $this->color,
            $this->blend
        );
    }
}
