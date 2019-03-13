<?php

namespace Alexa\Model\Services\Ups;

abstract class ErrorBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ErrorCode|null */
    private $code = null;

    /** @var string|null */
    private $message = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withCode(ErrorCode $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function withMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function build(): Error
    {
        return ($this->constructor)(
            $this->code,
            $this->message
        );
    }
}
