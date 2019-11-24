<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class ScaleTransformPropertyBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $scale = null;

    /** @var string|null */
    private $scaleX = null;

    /** @var string|null */
    private $scaleY = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $scale
     * @return self
     */
    public function withScale(string $scale): self
    {
        $this->scale = $scale;
        return $this;
    }

    /**
     * @param string $scaleX
     * @return self
     */
    public function withScaleX(string $scaleX): self
    {
        $this->scaleX = $scaleX;
        return $this;
    }

    /**
     * @param string $scaleY
     * @return self
     */
    public function withScaleY(string $scaleY): self
    {
        $this->scaleY = $scaleY;
        return $this;
    }

    public function build(): ScaleTransformProperty
    {
        return ($this->constructor)(
            $this->scale,
            $this->scaleX,
            $this->scaleY
        );
    }
}
