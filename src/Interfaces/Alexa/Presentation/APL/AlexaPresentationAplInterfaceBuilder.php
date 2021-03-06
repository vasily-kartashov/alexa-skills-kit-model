<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class AlexaPresentationAplInterfaceBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Runtime|null */
    private $runtime = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Runtime $runtime
     * @return self
     */
    public function withRuntime(Runtime $runtime): self
    {
        $this->runtime = $runtime;
        return $this;
    }

    public function build(): AlexaPresentationAplInterface
    {
        return ($this->constructor)(
            $this->runtime
        );
    }
}
