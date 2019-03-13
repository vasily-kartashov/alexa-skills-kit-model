<?php

namespace Alexa\Model\Services\ReminderManagement;

use \DateTime;

abstract class ReminderBuilder
{
    /** @var callable */
    private $constructor;

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

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withAlertToken(string $alertToken): self
    {
        $this->alertToken = $alertToken;
        return $this;
    }

    public function withCreatedTime(DateTime $createdTime): self
    {
        $this->createdTime = $createdTime;
        return $this;
    }

    public function withUpdatedTime(DateTime $updatedTime): self
    {
        $this->updatedTime = $updatedTime;
        return $this;
    }

    public function withStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function withTrigger(Trigger $trigger): self
    {
        $this->trigger = $trigger;
        return $this;
    }

    public function withAlertInfo(AlertInfo $alertInfo): self
    {
        $this->alertInfo = $alertInfo;
        return $this;
    }

    public function withPushNotification(PushNotification $pushNotification): self
    {
        $this->pushNotification = $pushNotification;
        return $this;
    }

    public function withVersion(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    public function build(): Reminder
    {
        return ($this->constructor)(
            $this->alertToken,
            $this->createdTime,
            $this->updatedTime,
            $this->status,
            $this->trigger,
            $this->alertInfo,
            $this->pushNotification,
            $this->version
        );
    }
}
