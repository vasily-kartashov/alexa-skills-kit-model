<?php

namespace Alexa\Model\Events\SkillEvents;

use \DateTime;

abstract class PermissionAcceptedRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var PermissionBody|null */
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
     * @param PermissionBody $body
     * @return self
     */
    public function withBody(PermissionBody $body): self
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

    public function build(): PermissionAcceptedRequest
    {
        return ($this->constructor)(
            $this->body,
            $this->eventCreationTime,
            $this->eventPublishingTime
        );
    }
}
