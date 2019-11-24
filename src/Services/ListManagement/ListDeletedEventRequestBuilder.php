<?php

namespace Alexa\Model\Services\ListManagement;

use \DateTime;

abstract class ListDeletedEventRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ListBody|null */
    private $body = null;

    /** @var DateTime|null */
    private $eventCreationTime = null;

    /** @var DateTime|null */
    private $eventPublishingTime = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param ListBody $body
     * @return self
     */
    public function withBody(ListBody $body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @param DateTime $eventCreationTime
     * @return self
     */
    public function withEventCreationTime(DateTime $eventCreationTime): self
    {
        $this->eventCreationTime = $eventCreationTime;
        return $this;
    }

    /**
     * @param DateTime $eventPublishingTime
     * @return self
     */
    public function withEventPublishingTime(DateTime $eventPublishingTime): self
    {
        $this->eventPublishingTime = $eventPublishingTime;
        return $this;
    }

    public function build(): ListDeletedEventRequest
    {
        return ($this->constructor)(
            $this->body,
            $this->eventCreationTime,
            $this->eventPublishingTime
        );
    }
}
