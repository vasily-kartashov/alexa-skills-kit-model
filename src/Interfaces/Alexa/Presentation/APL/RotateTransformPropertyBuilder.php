<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class RotateTransformPropertyBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $rotate = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $rotate
     * @return self
     */
    public function withRotate(string $rotate): self
    {
        $this->rotate = $rotate;
        return $this;
    }

    public function build(): RotateTransformProperty
    {
        return ($this->constructor)(
            $this->rotate
        );
    }
}
