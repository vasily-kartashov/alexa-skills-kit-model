<?php

namespace Alexa\Model\Services\ListManagement;

use Alexa\Model\Request;

abstract class ListItemsDeletedEventRequestBuilder
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

    public function build(): ListItemsDeletedEventRequest
    {
        return ($this->constructor)(
            $this->body
        );
    }
}
