<?php

namespace Alexa\Model\Services\ReminderManagement;

use \DateTime;
use \JsonSerializable;

final class GetReminderResponse implements JsonSerializable
{
    /** @var string|null */
    private $alertToken = null;

    /** @var DateTime|null */
    private $createdTime = null;

    /** @var DateTime|null */
    private $updatedTime = null;

    /** @var Status|null */
    private $status = null;

    /** @var Trigger|null */
    private $trigger = null;

    /** @var AlertInfo|null */
    private $alertInfo = null;

    /** @var PushNotification|null */
    private $pushNotification = null;

    /** @var string|null */
    private $version = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function alertToken()
    {
        return $this->alertToken;
    }

    /**
     * @return DateTime|null
     */
    public function createdTime()
    {
        return $this->createdTime;
    }

    /**
     * @return DateTime|null
     */
    public function updatedTime()
    {
        return $this->updatedTime;
    }

    /**
     * @return Status|null
     */
    public function status()
    {
        return $this->status;
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

    /**
     * @return string|null
     */
    public function version()
    {
        return $this->version;
    }

    public static function builder(): GetReminderResponseBuilder
    {
        $instance = new self();
        $constructor = function ($alertToken, $createdTime, $updatedTime, $status, $trigger, $alertInfo, $pushNotification, $version) use ($instance): GetReminderResponse {
            $instance->alertToken = $alertToken;
            $instance->createdTime = $createdTime;
            $instance->updatedTime = $updatedTime;
            $instance->status = $status;
            $instance->trigger = $trigger;
            $instance->alertInfo = $alertInfo;
            $instance->pushNotification = $pushNotification;
            $instance->version = $version;
            return $instance;
        };
        return new class($constructor) extends GetReminderResponseBuilder
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
        $instance->alertToken = isset($data['alertToken']) ? ((string) $data['alertToken']) : null;
        $instance->createdTime = isset($data['createdTime']) ? new DateTime($data['createdTime']) : null;
        $instance->updatedTime = isset($data['updatedTime']) ? new DateTime($data['updatedTime']) : null;
        $instance->status = isset($data['status']) ? Status::fromValue($data['status']) : null;
        $instance->trigger = isset($data['trigger']) ? Trigger::fromValue($data['trigger']) : null;
        $instance->alertInfo = isset($data['alertInfo']) ? AlertInfo::fromValue($data['alertInfo']) : null;
        $instance->pushNotification = isset($data['pushNotification']) ? PushNotification::fromValue($data['pushNotification']) : null;
        $instance->version = isset($data['version']) ? ((string) $data['version']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'alertToken' => $this->alertToken,
            'createdTime' => $this->createdTime,
            'updatedTime' => $this->updatedTime,
            'status' => $this->status,
            'trigger' => $this->trigger,
            'alertInfo' => $this->alertInfo,
            'pushNotification' => $this->pushNotification,
            'version' => $this->version
        ]);
    }
}
