<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class ReminderUpdatedEventRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Event|null */
    private $body = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withBody(Event $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function build(): ReminderUpdatedEventRequest
    {
        return ($this->constructor)(
            $this->body
        );
    }
}
