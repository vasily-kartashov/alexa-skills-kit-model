<?php

namespace Alexa\Model\Services\ProactiveEvents;

abstract class ErrorBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $code = null;

    /** @var string|null */
    private $message = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param int $code
     * @return self
     */
    public function withCode(int $code): self
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
