<?php

namespace Alexa\Model\Services\ListManagement;

abstract class ForbiddenErrorBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $message = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
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

    public function build(): ForbiddenError
    {
        return ($this->constructor)(
            $this->message
        );
    }
}
