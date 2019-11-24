<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class MoveTransformPropertyBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $translateX = null;

    /** @var string|null */
    private $translateY = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $translateX
     * @return self
     */
    public function withTranslateX(string $translateX): self
    {
        $this->translateX = $translateX;
        return $this;
    }

    /**
     * @param string $translateY
     * @return self
     */
    public function withTranslateY(string $translateY): self
    {
        $this->translateY = $translateY;
        return $this;
    }

    public function build(): MoveTransformProperty
    {
        return ($this->constructor)(
            $this->translateX,
            $this->translateY
        );
    }
}
