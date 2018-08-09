<?php

namespace Alexa\Model;

abstract class SessionEndedRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var SessionEndedReason|null */
    private $reason = null;

    /** @var SessionEndedError|null */
    private $error = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withReason(SessionEndedReason $reason): self
    {
        $this->reason = $reason;
        return $this;
    }

    public function withError(SessionEndedError $error): self
    {
        $this->error = $error;
        return $this;
    }

    public function build(): SessionEndedRequest
    {
        return ($this->constructor)(
            $this->reason,
            $this->error
        );
    }
}
