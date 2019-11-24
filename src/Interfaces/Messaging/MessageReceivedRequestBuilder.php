<?php

namespace Alexa\Model\Interfaces\Messaging;

abstract class MessageReceivedRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var array */
    private $message = [];

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $message
     * @return self
     */
    public function withMessage(array $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function build(): MessageReceivedRequest
    {
        return ($this->constructor)(
            $this->message
        );
    }
}
