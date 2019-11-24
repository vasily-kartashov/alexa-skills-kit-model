<?php

namespace Alexa\Model\Events\SkillEvents;

use \DateTime;

abstract class AccountLinkedRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var AccountLinkedBody|null */
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
     * @param AccountLinkedBody $body
     * @return self
     */
    public function withBody(AccountLinkedBody $body): self
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

    public function build(): AccountLinkedRequest
    {
        return ($this->constructor)(
            $this->body,
            $this->eventCreationTime,
            $this->eventPublishingTime
        );
    }
}
