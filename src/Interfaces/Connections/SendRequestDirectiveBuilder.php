<?php

namespace Alexa\Model\Interfaces\Connections;

abstract class SendRequestDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $name = null;

    /** @var array */
    private $payload = [];

    /** @var string|null */
    private $token = null;

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

    /**
     * @param string $token
     * @return self
     */
    public function withToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function build(): SendRequestDirective
    {
        return ($this->constructor)(
            $this->name,
            $this->payload,
            $this->token
        );
    }
}
