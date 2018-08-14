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

    public function withStatus(ConnectionsStatus $status): self
    {
        $this->status = $status;
        return $this;
    }

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
