<?php

namespace Alexa\Model\Services\ProactiveEvents;

use \DateTime;
use \JsonSerializable;

final class CreateProactiveEventRequest implements JsonSerializable
{
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

    protected function __construct()
    {
    }

    /**
     * @return DateTime|null
     */
    public function timestamp()
    {
        return $this->timestamp;
    }

    /**
     * @return string|null
     */
    public function referenceId()
    {
        return $this->referenceId;
    }

    /**
     * @return DateTime|null
     */
    public function expiryTime()
    {
        return $this->expiryTime;
    }

    /**
     * @return Event|null
     */
    public function event()
    {
        return $this->event;
    }

    /**
     * @return array
     */
    public function localizedAttributes()
    {
        return $this->localizedAttributes;
    }

    /**
     * @return RelevantAudience|null
     */
    public function relevantAudience()
    {
        return $this->relevantAudience;
    }

    public static function builder(): CreateProactiveEventRequestBuilder
    {
        $instance = new self();
        $constructor = function ($timestamp, $referenceId, $expiryTime, $event, $localizedAttributes, $relevantAudience) use ($instance): CreateProactiveEventRequest {
            $instance->timestamp = $timestamp;
            $instance->referenceId = $referenceId;
            $instance->expiryTime = $expiryTime;
            $instance->event = $event;
            $instance->localizedAttributes = $localizedAttributes;
            $instance->relevantAudience = $relevantAudience;
            return $instance;
        };
        return new class($constructor) extends CreateProactiveEventRequestBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->timestamp = isset($data['timestamp']) ? new DateTime($data['timestamp']) : null;
        $instance->referenceId = isset($data['referenceId']) ? ((string) $data['referenceId']) : null;
        $instance->expiryTime = isset($data['expiryTime']) ? new DateTime($data['expiryTime']) : null;
        $instance->event = isset($data['event']) ? Event::fromValue($data['event']) : null;
        $instance->localizedAttributes = [];
        if (isset($data['localizedAttributes'])) {
            foreach ($data['localizedAttributes'] as $item) {
                $element = $item;
                if ($element !== null) {
                    $instance->localizedAttributes[] = $element;
                }
            }
        }
        $instance->relevantAudience = isset($data['relevantAudience']) ? RelevantAudience::fromValue($data['relevantAudience']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'timestamp' => $this->timestamp,
            'referenceId' => $this->referenceId,
            'expiryTime' => $this->expiryTime,
            'event' => $this->event,
            'localizedAttributes' => $this->localizedAttributes,
            'relevantAudience' => $this->relevantAudience
        ]);
    }
}
