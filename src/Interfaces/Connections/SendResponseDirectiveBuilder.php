<?php

namespace Alexa\Model\Interfaces\Connections;

use Alexa\Model\Directive;

abstract class SendResponseDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ConnectionsStatus|null */
    private $status = null;

    /** @var null[] */
    private $payload = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withStatus(ConnectionsStatus $status): self
    {
        $this->status = $status;
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

    public function build(): SendResponseDirective
    {
        return ($this->constructor)(
            $this->status,
            $this->payload
        );
    }
}
