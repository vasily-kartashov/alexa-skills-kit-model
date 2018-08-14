<?php

namespace Alexa\Model\Interfaces\GameEngine;

abstract class StopInputHandlerDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $originatingRequestId = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withOriginatingRequestId(string $originatingRequestId): self
    {
        $this->originatingRequestId = $originatingRequestId;
        return $this;
    }

    public function build(): StopInputHandlerDirective
    {
        return ($this->constructor)(
            $this->originatingRequestId
        );
    }
}
