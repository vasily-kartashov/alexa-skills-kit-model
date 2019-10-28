<?php

namespace Alexa\Model\Services\ReminderManagement;

use \JsonSerializable;

final class Recurrence implements JsonSerializable
{
    /** @var RecurrenceFreq|null */
    private $freq = null;

    /** @var RecurrenceDay[] */
    private $byDay = [];

    /** @var int|null */
    private $interval = null;

    protected function __construct()
    {
    }

    /**
     * @return RecurrenceFreq|null
     */
    public function freq()
    {
        return $this->freq;
    }

    /**
     * @return RecurrenceDay[]
     */
    public function byDay()
    {
        return $this->byDay;
    }

    /**
     * @return int|null
     */
    public function interval()
    {
        return $this->interval;
    }

    public static function builder(): RecurrenceBuilder
    {
        $instance = new self;
        $constructor = function ($freq, $byDay, $interval) use ($instance): Recurrence {
            $instance->freq = $freq;
            $instance->byDay = $byDay;
            $instance->interval = $interval;
            return $instance;
        };
        return new class($constructor) extends RecurrenceBuilder
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
        $instance = new self;
        $instance->freq = isset($data['freq']) ? RecurrenceFreq::fromValue($data['freq']) : null;
        $instance->byDay = [];
        if (isset($data['byDay'])) {
            foreach ($data['byDay'] as $item) {
                $element = isset($item) ? RecurrenceDay::fromValue($item) : null;
                if ($element !== null) {
                    $instance->byDay[] = $element;
                }
            }
        }
        $instance->interval = isset($data['interval']) ? ((int) $data['interval']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'freq' => $this->freq,
            'byDay' => $this->byDay,
            'interval' => $this->interval
        ]);
    }
}
