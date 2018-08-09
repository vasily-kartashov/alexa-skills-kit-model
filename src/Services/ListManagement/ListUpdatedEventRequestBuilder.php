<?php

namespace Alexa\Model\Services\ListManagement;

use Alexa\Model\Request;

abstract class ListUpdatedEventRequestBuilder
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

    public function build(): ListUpdatedEventRequest
    {
        return ($this->constructor)(
            $this->body
        );
    }
}
