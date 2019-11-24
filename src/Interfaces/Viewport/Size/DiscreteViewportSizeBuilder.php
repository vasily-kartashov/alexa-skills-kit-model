<?php

namespace Alexa\Model\Interfaces\Viewport\Size;

abstract class DiscreteViewportSizeBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $pixelWidth = null;

    /** @var int|null */
    private $pixelHeight = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param int $pixelWidth
     * @return self
     */
    public function withPixelWidth(int $pixelWidth): self
    {
        $this->pixelWidth = $pixelWidth;
        return $this;
    }

    /**
     * @param int $pixelHeight
     * @return self
     */
    public function withPixelHeight(int $pixelHeight): self
    {
        $this->pixelHeight = $pixelHeight;
        return $this;
    }

    public function build(): DiscreteViewportSize
    {
        return ($this->constructor)(
            $this->pixelWidth,
            $this->pixelHeight
        );
    }
}
