<?php

namespace Alexa\Model\Services\ReminderManagement;

use \JsonSerializable;

final class Event implements JsonSerializable
{
    /** @var Status|null */
    private $status = null;

    /** @var string|null */
    private $alertToken = null;

    protected function __construct()
    {
    }

    /**
     * @return Status|null
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function alertToken()
    {
        return $this->alertToken;
    }

    public static function builder(): EventBuilder
    {
        $instance = new self;
        $constructor = function ($status, $alertToken) use ($instance): Event {
            $instance->status = $status;
            $instance->alertToken = $alertToken;
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
        $instance = new self;
        $instance->status = isset($data['status']) ? Status::fromValue($data['status']) : null;
        $instance->alertToken = isset($data['alertToken']) ? ((string) $data['alertToken']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'status' => $this->status,
            'alertToken' => $this->alertToken
        ]);
    }
}
