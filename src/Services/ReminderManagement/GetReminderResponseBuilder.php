<?php

namespace Alexa\Model\Services\ReminderManagement;

use \DateTime;

abstract class GetReminderResponseBuilder
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

    /**
     * @param mixed $alertToken
     * @return self
     */
    public function withAlertToken(string $alertToken): self
    {
        $this->alertToken = $alertToken;
        return $this;
    }

    /**
     * @param mixed $createdTime
     * @return self
     */
    public function withCreatedTime(DateTime $createdTime): self
    {
        $this->createdTime = $createdTime;
        return $this;
    }

    /**
     * @param mixed $updatedTime
     * @return self
     */
    public function withUpdatedTime(DateTime $updatedTime): self
    {
        $this->updatedTime = $updatedTime;
        return $this;
    }

    /**
     * @param mixed $status
     * @return self
     */
    public function withStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param mixed $trigger
     * @return self
     */
    public function withTrigger(Trigger $trigger): self
    {
        $this->trigger = $trigger;
        return $this;
    }

    /**
     * @param mixed $alertInfo
     * @return self
     */
    public function withAlertInfo(AlertInfo $alertInfo): self
    {
        $this->alertInfo = $alertInfo;
        return $this;
    }

    /**
     * @param mixed $pushNotification
     * @return self
     */
    public function withPushNotification(PushNotification $pushNotification): self
    {
        $this->pushNotification = $pushNotification;
        return $this;
    }

    /**
     * @param mixed $version
     * @return self
     */
    public function withVersion(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    public function build(): GetReminderResponse
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
