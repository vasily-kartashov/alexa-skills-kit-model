<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class ReminderDeletedEventRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ReminderDeletedEvent|null */
    private $body = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param ReminderDeletedEvent $body
     * @return self
     */
    public function withBody(ReminderDeletedEvent $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function build(): ReminderDeletedEventRequest
    {
        return ($this->constructor)(
            $this->body
        );
    }
}
