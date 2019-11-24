<?php

namespace Alexa\Model\SLU\EntityResolution;

abstract class StatusBuilder
{
    /** @var callable */
    private $constructor;

    /** @var StatusCode|null */
    private $code = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param StatusCode $code
     * @return self
     */
    public function withCode(StatusCode $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function build(): Status
    {
        return ($this->constructor)(
            $this->code
        );
    }
}
