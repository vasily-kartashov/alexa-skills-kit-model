<?php

namespace Alexa\Model\Services\ListManagement;

use \DateTime;

abstract class ListItemsCreatedEventRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ListItemBody|null */
    private $body = null;

    /** @var DateTime|null */
    private $eventCreationTime = null;

    /** @var DateTime|null */
    private $eventPublishingTime = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $body
     * @return self
     */
    public function withBody(ListItemBody $body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @param mixed $eventCreationTime
     * @return self
     */
    public function withEventCreationTime(DateTime $eventCreationTime): self
    {
        $this->eventCreationTime = $eventCreationTime;
        return $this;
    }

    /**
     * @param mixed $eventPublishingTime
     * @return self
     */
    public function withEventPublishingTime(DateTime $eventPublishingTime): self
    {
        $this->eventPublishingTime = $eventPublishingTime;
        return $this;
    }

    public function build(): ListItemsCreatedEventRequest
    {
        return ($this->constructor)(
            $this->body,
            $this->eventCreationTime,
            $this->eventPublishingTime
        );
    }
}
