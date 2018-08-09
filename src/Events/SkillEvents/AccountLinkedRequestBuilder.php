<?php

namespace Alexa\Model\Events\SkillEvents;

use Alexa\Model\Request;

abstract class AccountLinkedRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var AccountLinkedBody|null */
    private $body = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withBody(AccountLinkedBody $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function build(): AccountLinkedRequest
    {
        return ($this->constructor)(
            $this->body
        );
    }
}
