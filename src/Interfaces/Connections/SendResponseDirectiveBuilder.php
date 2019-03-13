<?php

namespace Alexa\Model\Interfaces\Connections;

abstract class SendResponseDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ConnectionsStatus|null */
    private $status = null;

    /** @var array */
    private $payload = [];

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
     * @param array $payload
     * @return self
     */
    public function withPayload(array $payload): self
    {
        $this->payload = $payload;
        return $this;
    }

    public function build(): SendResponseDirective
    {
        return ($this->constructor)(
            $this->status,
            $this->payload
        );
    }
}
