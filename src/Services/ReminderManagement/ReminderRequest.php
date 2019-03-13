<?php

namespace Alexa\Model\Services\ReminderManagement;

use \DateTime;
use \JsonSerializable;

final class ReminderRequest implements JsonSerializable
{
    /** @var DateTime|null */
    private $requestTime = null;

    /** @var Trigger|null */
    private $trigger = null;

    /** @var AlertInfo|null */
    private $alertInfo = null;

    /** @var PushNotification|null */
    private $pushNotification = null;

    protected function __construct()
    {
    }

    /**
     * @return DateTime|null
     */
    public function requestTime()
    {
        return $this->requestTime;
    }

    /**
     * @return Trigger|null
     */
    public function trigger()
    {
        return $this->trigger;
    }

    /**
     * @return AlertInfo|null
     */
    public function alertInfo()
    {
        return $this->alertInfo;
    }

    /**
     * @return PushNotification|null
     */
    public function pushNotification()
    {
        return $this->pushNotification;
    }

    public static function builder(): ReminderRequestBuilder
    {
        $instance = new self();
        $constructor = function ($requestTime, $trigger, $alertInfo, $pushNotification) use ($instance): ReminderRequest {
            $instance->requestTime = $requestTime;
            $instance->trigger = $trigger;
            $instance->alertInfo = $alertInfo;
            $instance->pushNotification = $pushNotification;
            return $instance;
        };
        return new class($constructor) extends ReminderRequestBuilder
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
        $instance->requestTime = isset($data['requestTime']) ? new DateTime($data['requestTime']) : null;
        $instance->trigger = isset($data['trigger']) ? Trigger::fromValue($data['trigger']) : null;
        $instance->alertInfo = isset($data['alertInfo']) ? AlertInfo::fromValue($data['alertInfo']) : null;
        $instance->pushNotification = isset($data['pushNotification']) ? PushNotification::fromValue($data['pushNotification']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'requestTime' => $this->requestTime,
            'trigger' => $this->trigger,
            'alertInfo' => $this->alertInfo,
            'pushNotification' => $this->pushNotification
        ]);
    }
}
