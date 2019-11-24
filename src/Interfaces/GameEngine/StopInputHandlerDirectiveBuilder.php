<?php

namespace Alexa\Model\Interfaces\GameEngine;

abstract class StopInputHandlerDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $originatingRequestId = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $originatingRequestId
     * @return self
     */
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
