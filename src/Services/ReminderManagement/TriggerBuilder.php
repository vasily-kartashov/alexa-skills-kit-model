<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class TriggerBuilder
{
    /** @var callable */
    private $constructor;

    /** @var TriggerType|null */
    private $type = null;

    /** @var mixed|null */
    private $scheduledTime = null;

    /** @var int|null */
    private $offsetInSeconds = null;

    /** @var string|null */
    private $timeZoneId = null;

    /** @var Recurrence|null */
    private $recurrence = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param TriggerType $type
     * @return self
     */
    public function withType(TriggerType $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param mixed $scheduledTime
     * @return self
     */
    public function withScheduledTime($scheduledTime): self
    {
        $this->scheduledTime = $scheduledTime;
        return $this;
    }

    /**
     * @param int $offsetInSeconds
     * @return self
     */
    public function withOffsetInSeconds(int $offsetInSeconds): self
    {
        $this->offsetInSeconds = $offsetInSeconds;
        return $this;
    }

    /**
     * @param string $timeZoneId
     * @return self
     */
    public function withTimeZoneId(string $timeZoneId): self
    {
        $this->timeZoneId = $timeZoneId;
        return $this;
    }

    /**
     * @param Recurrence $recurrence
     * @return self
     */
    public function withRecurrence(Recurrence $recurrence): self
    {
        $this->recurrence = $recurrence;
        return $this;
    }

    public function build(): Trigger
    {
        return ($this->constructor)(
            $this->type,
            $this->scheduledTime,
            $this->offsetInSeconds,
            $this->timeZoneId,
            $this->recurrence
        );
    }
}
