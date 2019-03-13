<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class ReminderCreatedEventRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Event|null */
    private $body = null;

    protected function __construct(callable $constructor)
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

    public function build(): ReminderCreatedEventRequest
    {
        return ($this->constructor)(
            $this->body
        );
    }
}
