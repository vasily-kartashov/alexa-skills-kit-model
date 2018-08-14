<?php

namespace Alexa\Model\Services\ListManagement;

abstract class ListCreatedEventRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ListBody|null */
    private $body = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withBody(ListBody $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function build(): ListCreatedEventRequest
    {
        return ($this->constructor)(
            $this->body
        );
    }
}
