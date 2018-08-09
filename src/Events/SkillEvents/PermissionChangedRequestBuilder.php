<?php

namespace Alexa\Model\Events\SkillEvents;

use Alexa\Model\Request;

abstract class PermissionChangedRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var PermissionBody|null */
    private $body = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withBody(PermissionBody $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function build(): PermissionChangedRequest
    {
        return ($this->constructor)(
            $this->body
        );
    }
}
