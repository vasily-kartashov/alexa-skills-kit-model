<?php

namespace Alexa\Model\Interfaces\System;

abstract class ErrorBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ErrorType|null */
    private $type = null;

    /** @var string|null */
    private $message = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withType(ErrorType $type): self
    {
        $this->type = $type;
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
            $this->type,
            $this->message
        );
    }
}
