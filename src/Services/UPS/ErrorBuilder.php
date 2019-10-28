<?php

namespace Alexa\Model\Services\UPS;

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

    /**
     * @param ErrorCode $code
     * @return self
     */
    public function withCode(ErrorCode $code): self
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param string $message
     * @return self
     */
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