<?php

namespace Alexa\Model\Interfaces\Connections;

abstract class ConnectionsStatusBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $code = null;

    /** @var string|null */
    private $message = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function withMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function build(): ConnectionsStatus
    {
        return ($this->constructor)(
            $this->code,
            $this->message
        );
    }
}
