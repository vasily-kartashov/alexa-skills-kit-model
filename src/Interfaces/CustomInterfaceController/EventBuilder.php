<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

abstract class EventBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Header|null */
    private $header = null;

    /** @var mixed|null */
    private $payload = null;

    /** @var Endpoint|null */
    private $endpoint = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Header $header
     * @return self
     */
    public function withHeader(Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @param mixed $payload
     * @return self
     */
    public function withPayload($payload): self
    {
        $this->payload = $payload;
        return $this;
    }

    /**
     * @param Endpoint $endpoint
     * @return self
     */
    public function withEndpoint(Endpoint $endpoint): self
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    public function build(): Event
    {
        return ($this->constructor)(
            $this->header,
            $this->payload,
            $this->endpoint
        );
    }
}
