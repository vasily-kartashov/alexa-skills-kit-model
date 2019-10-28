<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class AnimatedOpacityPropertyBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $from = null;

    /** @var string|null */
    private $to = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $from
     * @return self
     */
    public function withFrom(string $from): self
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @param string $to
     * @return self
     */
    public function withTo(string $to): self
    {
        $this->to = $to;
        return $this;
    }

    public function build(): AnimatedOpacityProperty
    {
        return ($this->constructor)(
            $this->from,
            $this->to
        );
    }
}
