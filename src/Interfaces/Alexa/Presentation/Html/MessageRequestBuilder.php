<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

abstract class MessageRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var mixed|null */
    private $message = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $message
     * @return self
     */
    public function withMessage($message): self
    {
        $this->message = $message;
        return $this;
    }

    public function build(): MessageRequest
    {
        return ($this->constructor)(
            $this->message
        );
    }
}
