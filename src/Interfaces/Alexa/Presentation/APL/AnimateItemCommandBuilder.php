<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class AnimateItemCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $componentId = null;

    /** @var string|null */
    private $duration = null;

    /** @var string|null */
    private $easing = null;

    /** @var string|null */
    private $repeatCount = null;

    /** @var AnimateItemRepeatMode|null */
    private $repeatMode = null;

    /** @var AnimatedProperty[] */
    private $value = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
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
     * @param string $duration
     * @return self
     */
    public function withDuration(string $duration): self
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @param string $easing
     * @return self
     */
    public function withEasing(string $easing): self
    {
        $this->easing = $easing;
        return $this;
    }

    /**
     * @param string $repeatCount
     * @return self
     */
    public function withRepeatCount(string $repeatCount): self
    {
        $this->repeatCount = $repeatCount;
        return $this;
    }

    /**
     * @param AnimateItemRepeatMode $repeatMode
     * @return self
     */
    public function withRepeatMode(AnimateItemRepeatMode $repeatMode): self
    {
        $this->repeatMode = $repeatMode;
        return $this;
    }

    /**
     * @param array $value
     * @return self
     */
    public function withValue(array $value): self
    {
        foreach ($value as $element) {
            assert($element instanceof AnimatedProperty);
        }
        $this->value = $value;
        return $this;
    }

    public function build(): AnimateItemCommand
    {
        return ($this->constructor)(
            $this->componentId,
            $this->duration,
            $this->easing,
            $this->repeatCount,
            $this->repeatMode,
            $this->value
        );
    }
}
