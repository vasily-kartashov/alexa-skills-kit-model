<?php

namespace Alexa\Model\Interfaces\Connections;

abstract class ConnectionsResponseBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ConnectionsStatus|null */
    private $status = null;

    /** @var string|null */
    private $name = null;

    /** @var array */
    private $payload = [];

    /** @var string|null */
    private $token = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $status
     * @return self
     */
    public function withStatus(ConnectionsStatus $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param mixed $name
     * @return self
     */
    public function withName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param array $payload
     * @return self
     */
    public function withPayload(array $payload): self
    {
        $this->payload = $payload;
        return $this;
    }

    /**
     * @param mixed $token
     * @return self
     */
    public function withToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function build(): ConnectionsResponse
    {
        return ($this->constructor)(
            $this->status,
            $this->name,
            $this->payload,
            $this->token
        );
    }
}
