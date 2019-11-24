<?php

namespace Alexa\Model;

abstract class SessionResumedRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Cause|null */
    private $cause = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Cause $cause
     * @return self
     */
    public function withCause(Cause $cause): self
    {
        $this->cause = $cause;
        return $this;
    }

    public function build(): SessionResumedRequest
    {
        return ($this->constructor)(
            $this->cause
        );
    }
}
