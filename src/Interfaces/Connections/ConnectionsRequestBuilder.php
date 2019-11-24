<?php

namespace Alexa\Model\Interfaces\Connections;

abstract class ConnectionsRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $name = null;

    /** @var array */
    private $payload = [];

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $name
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

    public function build(): ConnectionsRequest
    {
        return ($this->constructor)(
            $this->name,
            $this->payload
        );
    }
}
