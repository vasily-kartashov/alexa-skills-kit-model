<?php

namespace Alexa\Model\Events\SkillEvents;

use \DateTime;

abstract class SkillDisabledRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var DateTime|null */
    private $eventCreationTime = null;

    /** @var DateTime|null */
    private $eventPublishingTime = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
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

    public function build(): SkillDisabledRequest
    {
        return ($this->constructor)(
            $this->eventCreationTime,
            $this->eventPublishingTime
        );
    }
}
