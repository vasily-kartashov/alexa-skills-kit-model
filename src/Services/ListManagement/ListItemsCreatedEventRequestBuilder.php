<?php

namespace Alexa\Model\Services\ListManagement;

abstract class ListItemsCreatedEventRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ListItemBody|null */
    private $body = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withBody(ListItemBody $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function build(): ListItemsCreatedEventRequest
    {
        return ($this->constructor)(
            $this->body
        );
    }
}
