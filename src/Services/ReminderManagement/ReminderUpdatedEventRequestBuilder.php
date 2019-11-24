<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class ReminderUpdatedEventRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Event|null */
    private $body = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Event $body
     * @return self
     */
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
