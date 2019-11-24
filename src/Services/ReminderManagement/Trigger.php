<?php

namespace Alexa\Model\Services\ReminderManagement;

use JsonSerializable;

final class Trigger implements JsonSerializable
{
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

    protected function __construct()
    {
    }

    /**
     * @return TriggerType|null
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return mixed|null
     */
    public function scheduledTime()
    {
        return $this->scheduledTime;
    }

    /**
     * @return int|null
     */
    public function offsetInSeconds()
    {
        return $this->offsetInSeconds;
    }

    /**
     * @return string|null
     */
    public function timeZoneId()
    {
        return $this->timeZoneId;
    }

    /**
     * @return Recurrence|null
     */
    public function recurrence()
    {
        return $this->recurrence;
    }

    public static function builder(): TriggerBuilder
    {
        $instance = new self;
        return new class($constructor = function ($type, $scheduledTime, $offsetInSeconds, $timeZoneId, $recurrence) use ($instance): Trigger {
            $instance->type = $type;
            $instance->scheduledTime = $scheduledTime;
            $instance->offsetInSeconds = $offsetInSeconds;
            $instance->timeZoneId = $timeZoneId;
            $instance->recurrence = $recurrence;
            return $instance;
        }) extends TriggerBuilder {};
    }

    /**
     * @param TriggerType $type
     * @return self
     */
    public static function ofType(TriggerType $type): Trigger
    {
        $instance = new self;
        $instance->type = $type;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = isset($data['type']) ? TriggerType::fromValue($data['type']) : null;
        $instance->scheduledTime = $data['scheduledTime'];
        $instance->offsetInSeconds = isset($data['offsetInSeconds']) ? ((int) $data['offsetInSeconds']) : null;
        $instance->timeZoneId = isset($data['timeZoneId']) ? ((string) $data['timeZoneId']) : null;
        $instance->recurrence = isset($data['recurrence']) ? Recurrence::fromValue($data['recurrence']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => $this->type,
            'scheduledTime' => $this->scheduledTime,
            'offsetInSeconds' => $this->offsetInSeconds,
            'timeZoneId' => $this->timeZoneId,
            'recurrence' => $this->recurrence
        ]);
    }
}
