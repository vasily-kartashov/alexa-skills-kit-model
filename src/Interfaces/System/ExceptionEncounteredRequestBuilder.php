<?php

namespace Alexa\Model\Interfaces\System;

abstract class ExceptionEncounteredRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Error|null */
    private $error = null;

    /** @var ErrorCause|null */
    private $cause = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Error $error
     * @return self
     */
    public function withError(Error $error): self
    {
        $this->error = $error;
        return $this;
    }

    /**
     * @param ErrorCause $cause
     * @return self
     */
    public function withCause(ErrorCause $cause): self
    {
        $this->cause = $cause;
        return $this;
    }

    public function build(): ExceptionEncounteredRequest
    {
        return ($this->constructor)(
            $this->error,
            $this->cause
        );
    }
}
