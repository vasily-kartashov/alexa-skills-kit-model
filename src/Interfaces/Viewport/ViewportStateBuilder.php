<?php

namespace Alexa\Model\Interfaces\Viewport;

abstract class ViewportStateBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Experience[] */
    private $experiences = [];

    /** @var Shape|null */
    private $shape = null;

    /** @var mixed|null */
    private $pixelWidth = null;

    /** @var mixed|null */
    private $pixelHeight = null;

    /** @var mixed|null */
    private $dpi = null;

    /** @var mixed|null */
    private $currentPixelWidth = null;

    /** @var mixed|null */
    private $currentPixelHeight = null;

    /** @var Touch[] */
    private $touch = [];

    /** @var Keyboard[] */
    private $keyboard = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $experiences
     * @return self
     */
    public function withExperiences(array $experiences): self
    {
        foreach ($experiences as $element) {
            assert($element instanceof Experience);
        }
        $this->experiences = $experiences;
        return $this;
    }

    /**
     * @param Shape $shape
     * @return self
     */
    public function withShape(Shape $shape): self
    {
        $this->shape = $shape;
        return $this;
    }

    /**
     * @param mixed $pixelWidth
     * @return self
     */
    public function withPixelWidth($pixelWidth): self
    {
        $this->pixelWidth = $pixelWidth;
        return $this;
    }

    /**
     * @param mixed $pixelHeight
     * @return self
     */
    public function withPixelHeight($pixelHeight): self
    {
        $this->pixelHeight = $pixelHeight;
        return $this;
    }

    /**
     * @param mixed $dpi
     * @return self
     */
    public function withDpi($dpi): self
    {
        $this->dpi = $dpi;
        return $this;
    }

    /**
     * @param mixed $currentPixelWidth
     * @return self
     */
    public function withCurrentPixelWidth($currentPixelWidth): self
    {
        $this->currentPixelWidth = $currentPixelWidth;
        return $this;
    }

    /**
     * @param mixed $currentPixelHeight
     * @return self
     */
    public function withCurrentPixelHeight($currentPixelHeight): self
    {
        $this->currentPixelHeight = $currentPixelHeight;
        return $this;
    }

    /**
     * @param array $touch
     * @return self
     */
    public function withTouch(array $touch): self
    {
        foreach ($touch as $element) {
            assert($element instanceof Touch);
        }
        $this->touch = $touch;
        return $this;
    }

    /**
     * @param array $keyboard
     * @return self
     */
    public function withKeyboard(array $keyboard): self
    {
        foreach ($keyboard as $element) {
            assert($element instanceof Keyboard);
        }
        $this->keyboard = $keyboard;
        return $this;
    }

    public function build(): ViewportState
    {
        return ($this->constructor)(
            $this->experiences,
            $this->shape,
            $this->pixelWidth,
            $this->pixelHeight,
            $this->dpi,
            $this->currentPixelWidth,
            $this->currentPixelHeight,
            $this->touch,
            $this->keyboard
        );
    }
}
