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

    /**
     * @param mixed $shouldEndInputHandler
     * @return self
     */
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
        foreach ($meets as $element) {
            assert(is_string($element));
        }
        $this->meets = $meets;
        return $this;
    }

    /**
     * @param string[] $fails
     * @return self
     */
    public function withFails(array $fails): self
    {
        foreach ($fails as $element) {
            assert(is_string($element));
        }
        $this->fails = $fails;
        return $this;
    }

    /**
     * @param mixed $reports
     * @return self
     */
    public function withReports(EventReportingType $reports): self
    {
        $this->reports = $reports;
        return $this;
    }

    /**
     * @param mixed $maximumInvocations
     * @return self
     */
    public function withMaximumInvocations(int $maximumInvocations): self
    {
        $this->maximumInvocations = $maximumInvocations;
        return $this;
    }

    /**
     * @param mixed $triggerTimeMilliseconds
     * @return self
     */
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
