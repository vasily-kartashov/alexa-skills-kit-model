<?php

namespace Alexa\Model\Services\ListManagement;

abstract class ForbiddenErrorBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $message = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function build(): ForbiddenError
    {
        return ($this->constructor)(
            $this->message
        );
    }
}
