<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class ReminderDeletedEventRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ReminderDeletedEvent|null */
    private $body = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $body
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
