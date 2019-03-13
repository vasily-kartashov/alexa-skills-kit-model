<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

abstract class ErrorBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $message = null;

    /** @var ErrorType|null */
    private $type = null;

    protected function __construct(callable $constructor)
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

    /**
     * @param ErrorType $type
     * @return self
     */
    public function withType(ErrorType $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function build(): Error
    {
        return ($this->constructor)(
            $this->message,
            $this->type
        );
    }
}
