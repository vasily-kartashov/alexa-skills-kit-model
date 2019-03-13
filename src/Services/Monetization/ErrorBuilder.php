<?php

namespace Alexa\Model\Services\Monetization;

abstract class ErrorBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $message = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $message
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
            $this->message
        );
    }
}
