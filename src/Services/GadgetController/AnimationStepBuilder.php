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

    public function withDurationMs(int $durationMs): self
    {
        $this->durationMs = $durationMs;
        return $this;
    }

    public function withColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

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
