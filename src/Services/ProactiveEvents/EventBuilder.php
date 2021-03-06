<?php

namespace Alexa\Model\Services\ProactiveEvents;

abstract class EventBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $name = null;

    /** @var mixed|null */
    private $payload = null;

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
     * @param mixed $payload
     * @return self
     */
    public function withPayload($payload): self
    {
        $this->payload = $payload;
        return $this;
    }

    public function build(): Event
    {
        return ($this->constructor)(
            $this->name,
            $this->payload
        );
    }
}
