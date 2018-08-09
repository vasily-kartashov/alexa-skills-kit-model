<?php

namespace Alexa\Model\Services\GadgetController;

abstract class LightAnimationBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $repeat = null;

    /** @var string[] */
    private $targetLights = [];

    /** @var AnimationStep[] */
    private $sequence = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withRepeat(int $repeat): self
    {
        $this->repeat = $repeat;
        return $this;
    }

    /**
     * @param string[] $targetLights
     * @return self
     */
    public function withTargetLights(array $targetLights): self
    {
        $this->targetLights = $targetLights;
        return $this;
    }

    /**
     * @param AnimationStep[] $sequence
     * @return self
     */
    public function withSequence(array $sequence): self
    {
        $this->sequence = $sequence;
        return $this;
    }

    public function build(): LightAnimation
    {
        return ($this->constructor)(
            $this->repeat,
            $this->targetLights,
            $this->sequence
        );
    }
}
