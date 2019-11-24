<?php

namespace Alexa\Model\Events\SkillEvents;

use \DateTime;

abstract class SkillEnabledRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var DateTime|null */
    private $eventCreationTime = null;

    /** @var DateTime|null */
    private $eventPublishingTime = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
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

    public function build(): SkillEnabledRequest
    {
        return ($this->constructor)(
            $this->eventCreationTime,
            $this->eventPublishingTime
        );
    }
}
