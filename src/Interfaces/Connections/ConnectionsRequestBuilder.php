<?php

namespace Alexa\Model\Interfaces\Connections;

use Alexa\Model\Request;

abstract class ConnectionsRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $name = null;

    /** @var null[] */
    private $payload = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param null[] $payload
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
