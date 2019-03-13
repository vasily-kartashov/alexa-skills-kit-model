<?php

namespace Alexa\Model\Events\SkillEvents;

abstract class ProactiveSubscriptionChangedRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ProactiveSubscriptionChangedBody|null */
    private $body = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withBody(ProactiveSubscriptionChangedBody $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function build(): ProactiveSubscriptionChangedRequest
    {
        return ($this->constructor)(
            $this->body
        );
    }
}
