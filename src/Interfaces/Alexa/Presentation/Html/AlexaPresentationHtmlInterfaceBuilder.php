<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

abstract class AlexaPresentationHtmlInterfaceBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Runtime|null */
    private $runtime = null;

    protected function __construct(callable $constructor)
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

    public function build(): AlexaPresentationHtmlInterface
    {
        return ($this->constructor)(
            $this->runtime
        );
    }
}
