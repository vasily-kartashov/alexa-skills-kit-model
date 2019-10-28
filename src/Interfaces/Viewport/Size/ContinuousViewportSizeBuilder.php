<?php

namespace Alexa\Model\Interfaces\Viewport\Size;

abstract class ContinuousViewportSizeBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $minPixelWidth = null;

    /** @var int|null */
    private $minPixelHeight = null;

    /** @var int|null */
    private $maxPixelWidth = null;

    /** @var int|null */
    private $maxPixelHeight = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param int $minPixelWidth
     * @return self
     */
    public function withMinPixelWidth(int $minPixelWidth): self
    {
        $this->minPixelWidth = $minPixelWidth;
        return $this;
    }

    /**
     * @param int $minPixelHeight
     * @return self
     */
    public function withMinPixelHeight(int $minPixelHeight): self
    {
        $this->minPixelHeight = $minPixelHeight;
        return $this;
    }

    /**
     * @param int $maxPixelWidth
     * @return self
     */
    public function withMaxPixelWidth(int $maxPixelWidth): self
    {
        $this->maxPixelWidth = $maxPixelWidth;
        return $this;
    }

    /**
     * @param int $maxPixelHeight
     * @return self
     */
    public function withMaxPixelHeight(int $maxPixelHeight): self
    {
        $this->maxPixelHeight = $maxPixelHeight;
        return $this;
    }

    public function build(): ContinuousViewportSize
    {
        return ($this->constructor)(
            $this->minPixelWidth,
            $this->minPixelHeight,
            $this->maxPixelWidth,
            $this->maxPixelHeight
        );
    }
}
