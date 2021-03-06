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

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param int $repeat
     * @return self
     */
    public function withRepeat(int $repeat): self
    {
        $this->repeat = $repeat;
        return $this;
    }

    /**
     * @param array $targetLights
     * @return self
     */
    public function withTargetLights(array $targetLights): self
    {
        foreach ($targetLights as $element) {
            assert(is_string($element));
        }
        $this->targetLights = $targetLights;
        return $this;
    }

    /**
     * @param array $sequence
     * @return self
     */
    public function withSequence(array $sequence): self
    {
        foreach ($sequence as $element) {
            assert($element instanceof AnimationStep);
        }
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
