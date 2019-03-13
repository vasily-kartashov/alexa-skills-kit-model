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

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withArcMinuteWidth($arcMinuteWidth): self
    {
        $this->arcMinuteWidth = $arcMinuteWidth;
        return $this;
    }

    public function withArcMinuteHeight($arcMinuteHeight): self
    {
        $this->arcMinuteHeight = $arcMinuteHeight;
        return $this;
    }

    public function withCanRotate(bool $canRotate): self
    {
        $this->canRotate = $canRotate;
        return $this;
    }

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
