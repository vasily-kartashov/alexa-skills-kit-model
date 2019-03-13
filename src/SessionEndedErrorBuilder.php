<?php

namespace Alexa\Model;

abstract class SessionEndedErrorBuilder
{
    /** @var callable */
    private $constructor;

    /** @var SessionEndedErrorType|null */
    private $type = null;

    /** @var string|null */
    private $message = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param SessionEndedErrorType $type
     * @return self
     */
    public function withType(SessionEndedErrorType $type): self
    {
        $this->type = $type;
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

    public function build(): SessionEndedError
    {
        return ($this->constructor)(
            $this->type,
            $this->message
        );
    }
}
