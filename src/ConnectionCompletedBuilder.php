<?php

namespace Alexa\Model;

abstract class ConnectionCompletedBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $token = null;

    /** @var Status|null */
    private $status = null;

    /** @var mixed|null */
    private $result = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $token
     * @return self
     */
    public function withToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @param Status $status
     * @return self
     */
    public function withStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param mixed $result
     * @return self
     */
    public function withResult($result): self
    {
        $this->result = $result;
        return $this;
    }

    public function build(): ConnectionCompleted
    {
        return ($this->constructor)(
            $this->token,
            $this->status,
            $this->result
        );
    }
}
