<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class SkewTransformPropertyBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $skewX = null;

    /** @var string|null */
    private $skewY = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $skewX
     * @return self
     */
    public function withSkewX(string $skewX): self
    {
        $this->skewX = $skewX;
        return $this;
    }

    /**
     * @param string $skewY
     * @return self
     */
    public function withSkewY(string $skewY): self
    {
        $this->skewY = $skewY;
        return $this;
    }

    public function build(): SkewTransformProperty
    {
        return ($this->constructor)(
            $this->skewX,
            $this->skewY
        );
    }
}
