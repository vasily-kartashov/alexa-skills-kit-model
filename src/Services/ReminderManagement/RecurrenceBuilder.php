<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class RecurrenceBuilder
{
    /** @var callable */
    private $constructor;

    /** @var RecurrenceFreq|null */
    private $freq = null;

    /** @var RecurrenceDay[] */
    private $byDay = [];

    /** @var int|null */
    private $interval = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withFreq(RecurrenceFreq $freq): self
    {
        $this->freq = $freq;
        return $this;
    }

    /**
     * @param RecurrenceDay[] $byDay
     * @return self
     */
    public function withByDay(array $byDay): self
    {
        foreach ($byDay as $element) {
            assert($element instanceof RecurrenceDay);
        }
        $this->byDay = $byDay;
        return $this;
    }

    public function withInterval(int $interval): self
    {
        $this->interval = $interval;
        return $this;
    }

    public function build(): Recurrence
    {
        return ($this->constructor)(
            $this->freq,
            $this->byDay,
            $this->interval
        );
    }
}
