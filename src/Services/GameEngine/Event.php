<?php

namespace Alexa\Model\Services\GameEngine;

use \JsonSerializable;

final class Event implements JsonSerializable
{
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

    protected function __construct()
    {
    }

    /**
     * @return bool|null
     */
    public function shouldEndInputHandler()
    {
        return $this->shouldEndInputHandler;
    }

    /**
     * @return string[]
     */
    public function meets()
    {
        return $this->meets;
    }

    /**
     * @return string[]
     */
    public function fails()
    {
        return $this->fails;
    }

    /**
     * @return EventReportingType|null
     */
    public function reports()
    {
        return $this->reports;
    }

    /**
     * @return int|null
     */
    public function maximumInvocations()
    {
        return $this->maximumInvocations;
    }

    /**
     * @return int|null
     */
    public function triggerTimeMilliseconds()
    {
        return $this->triggerTimeMilliseconds;
    }

    public static function builder(): EventBuilder
    {
        $instance = new self();
        $constructor = function ($shouldEndInputHandler, $meets, $fails, $reports, $maximumInvocations, $triggerTimeMilliseconds) use ($instance): Event {
            $instance->shouldEndInputHandler = $shouldEndInputHandler;
            $instance->meets = $meets;
            $instance->fails = $fails;
            $instance->reports = $reports;
            $instance->maximumInvocations = $maximumInvocations;
            $instance->triggerTimeMilliseconds = $triggerTimeMilliseconds;
            return $instance;
        };
        return new class($constructor) extends EventBuilder
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
        $instance->shouldEndInputHandler = isset($data['shouldEndInputHandler']) ? ((bool) $data['shouldEndInputHandler']) : null;
        $instance->meets = [];
        if (isset($data['meets'])) {
            foreach ($data['meets'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->meets[] = $element;
                }
            }
        }
        $instance->fails = [];
        if (isset($data['fails'])) {
            foreach ($data['fails'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->fails[] = $element;
                }
            }
        }
        $instance->reports = isset($data['reports']) ? EventReportingType::fromValue($data['reports']) : null;
        $instance->maximumInvocations = isset($data['maximumInvocations']) ? ((int) $data['maximumInvocations']) : null;
        $instance->triggerTimeMilliseconds = isset($data['triggerTimeMilliseconds']) ? ((int) $data['triggerTimeMilliseconds']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'shouldEndInputHandler' => $this->shouldEndInputHandler,
            'meets' => $this->meets,
            'fails' => $this->fails,
            'reports' => $this->reports,
            'maximumInvocations' => $this->maximumInvocations,
            'triggerTimeMilliseconds' => $this->triggerTimeMilliseconds
        ]);
    }
}
