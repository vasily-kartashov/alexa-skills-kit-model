<?php

namespace Alexa\Model\Services\ProactiveEvents;

use \DateTime;

abstract class CreateProactiveEventRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var DateTime|null */
    private $timestamp = null;

    /** @var string|null */
    private $referenceId = null;

    /** @var DateTime|null */
    private $expiryTime = null;

    /** @var Event|null */
    private $event = null;

    /** @var array */
    private $localizedAttributes = [];

    /** @var RelevantAudience|null */
    private $relevantAudience = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param DateTime $timestamp
     * @return self
     */
    public function withTimestamp(DateTime $timestamp): self
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @param string $referenceId
     * @return self
     */
    public function withReferenceId(string $referenceId): self
    {
        $this->referenceId = $referenceId;
        return $this;
    }

    /**
     * @param DateTime $expiryTime
     * @return self
     */
    public function withExpiryTime(DateTime $expiryTime): self
    {
        $this->expiryTime = $expiryTime;
        return $this;
    }

    /**
     * @param Event $event
     * @return self
     */
    public function withEvent(Event $event): self
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @param array $localizedAttributes
     * @return self
     */
    public function withLocalizedAttributes(array $localizedAttributes): self
    {
        $this->localizedAttributes = $localizedAttributes;
        return $this;
    }

    /**
     * @param RelevantAudience $relevantAudience
     * @return self
     */
    public function withRelevantAudience(RelevantAudience $relevantAudience): self
    {
        $this->relevantAudience = $relevantAudience;
        return $this;
    }

    public function build(): CreateProactiveEventRequest
    {
        return ($this->constructor)(
            $this->timestamp,
            $this->referenceId,
            $this->expiryTime,
            $this->event,
            $this->localizedAttributes,
            $this->relevantAudience
        );
    }
}
