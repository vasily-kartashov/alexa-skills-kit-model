<?php

namespace Alexa\Model\Interfaces\Viewport;

use Alexa\Model\Interfaces\Viewport\APL\ViewportConfiguration;

abstract class APLViewportStateBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Shape|null */
    private $shape = null;

    /** @var mixed|null */
    private $dpi = null;

    /** @var PresentationType|null */
    private $presentationType = null;

    /** @var bool|null */
    private $canRotate = null;

    /** @var ViewportConfiguration|null */
    private $configuration = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
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
     * @param mixed $dpi
     * @return self
     */
    public function withDpi($dpi): self
    {
        $this->dpi = $dpi;
        return $this;
    }

    /**
     * @param PresentationType $presentationType
     * @return self
     */
    public function withPresentationType(PresentationType $presentationType): self
    {
        $this->presentationType = $presentationType;
        return $this;
    }

    /**
     * @param bool $canRotate
     * @return self
     */
    public function withCanRotate(bool $canRotate): self
    {
        $this->canRotate = $canRotate;
        return $this;
    }

    /**
     * @param ViewportConfiguration $configuration
     * @return self
     */
    public function withConfiguration(ViewportConfiguration $configuration): self
    {
        $this->configuration = $configuration;
        return $this;
    }

    public function build(): APLViewportState
    {
        return ($this->constructor)(
            $this->shape,
            $this->dpi,
            $this->presentationType,
            $this->canRotate,
            $this->configuration
        );
    }
}
