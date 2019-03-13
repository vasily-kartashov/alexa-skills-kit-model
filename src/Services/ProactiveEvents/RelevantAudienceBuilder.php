<?php

namespace Alexa\Model\Services\ProactiveEvents;

abstract class RelevantAudienceBuilder
{
    /** @var callable */
    private $constructor;

    /** @var RelevantAudienceType|null */
    private $type = null;

    /** @var mixed|null */
    private $payload = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withType(RelevantAudienceType $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function withPayload($payload): self
    {
        $this->payload = $payload;
        return $this;
    }

    public function build(): RelevantAudience
    {
        return ($this->constructor)(
            $this->type,
            $this->payload
        );
    }
}
