<?php

namespace Alexa\Model\Interfaces\Viewport;

abstract class ExperienceBuilder
{
    /** @var callable */
    private $constructor;

    /** @var mixed|null */
    private $arcMinuteWidth = null;

    /** @var mixed|null */
    private $arcMinuteHeight = null;

    /** @var bool|null */
    private $canRotate = null;

    /** @var bool|null */
    private $canResize = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $arcMinuteWidth
     * @return self
     */
    public function withArcMinuteWidth($arcMinuteWidth): self
    {
        $this->arcMinuteWidth = $arcMinuteWidth;
        return $this;
    }

    /**
     * @param mixed $arcMinuteHeight
     * @return self
     */
    public function withArcMinuteHeight($arcMinuteHeight): self
    {
        $this->arcMinuteHeight = $arcMinuteHeight;
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
     * @param bool $canResize
     * @return self
     */
    public function withCanResize(bool $canResize): self
    {
        $this->canResize = $canResize;
        return $this;
    }

    public function build(): Experience
    {
        return ($this->constructor)(
            $this->arcMinuteWidth,
            $this->arcMinuteHeight,
            $this->canRotate,
            $this->canResize
        );
    }
}
