<?php

namespace Alexa\Model\Services\GameEngine;

abstract class EventBuilder
{
    /** @var callable */
    private $constructor;

    /** @var bool|null */
    private $shouldEndInputHandler = null;

    /** @var string[] */
    private $meets = [];

    /** @var string[] */
    private $fails = [];

    /** @var EventReportingType|null */
    private $reports = null;

    /** @var int|null */
    private $maximumInvocations = null;

    /** @var int|null */
    private $triggerTimeMilliseconds = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withShouldEndInputHandler(bool $shouldEndInputHandler): self
    {
        $this->shouldEndInputHandler = $shouldEndInputHandler;
        return $this;
    }

    /**
     * @param string[] $meets
     * @return self
     */
    public function withMeets(array $meets): self
    {
        $this->meets = $meets;
        return $this;
    }

    /**
     * @param string[] $fails
     * @return self
     */
    public function withFails(array $fails): self
    {
        $this->fails = $fails;
        return $this;
    }

    public function withReports(EventReportingType $reports): self
    {
        $this->reports = $reports;
        return $this;
    }

    public function withMaximumInvocations(int $maximumInvocations): self
    {
        $this->maximumInvocations = $maximumInvocations;
        return $this;
    }

    public function withTriggerTimeMilliseconds(int $triggerTimeMilliseconds): self
    {
        $this->triggerTimeMilliseconds = $triggerTimeMilliseconds;
        return $this;
    }

    public function build(): Event
    {
        return ($this->constructor)(
            $this->shouldEndInputHandler,
            $this->meets,
            $this->fails,
            $this->reports,
            $this->maximumInvocations,
            $this->triggerTimeMilliseconds
        );
    }
}
