<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class AnimatedTransformPropertyBuilder
{
    /** @var callable */
    private $constructor;

    /** @var TransformProperty[] */
    private $from = [];

    /** @var TransformProperty[] */
    private $to = [];

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $from
     * @return self
     */
    public function withFrom(array $from): self
    {
        foreach ($from as $element) {
            assert($element instanceof TransformProperty);
        }
        $this->from = $from;
        return $this;
    }

    /**
     * @param array $to
     * @return self
     */
    public function withTo(array $to): self
    {
        foreach ($to as $element) {
            assert($element instanceof TransformProperty);
        }
        $this->to = $to;
        return $this;
    }

    public function build(): AnimatedTransformProperty
    {
        return ($this->constructor)(
            $this->from,
            $this->to
        );
    }
}
