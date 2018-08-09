<?php

namespace Alexa\Model\Services\ListManagement;

use Alexa\Model\Request;

abstract class ListItemsUpdatedEventRequestBuilder
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

    public function build(): ListItemsUpdatedEventRequest
    {
        return ($this->constructor)(
            $this->body
        );
    }
}
