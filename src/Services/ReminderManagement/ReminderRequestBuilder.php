<?php

namespace Alexa\Model\Services\ReminderManagement;

use \DateTime;

abstract class ReminderRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var DateTime|null */
    private $requestTime = null;

    /** @var Trigger|null */
    private $trigger = null;

    /** @var AlertInfo|null */
    private $alertInfo = null;

    /** @var PushNotification|null */
    private $pushNotification = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param DateTime $requestTime
     * @return self
     */
    public function withRequestTime(DateTime $requestTime): self
    {
        $this->requestTime = $requestTime;
        return $this;
    }

    /**
     * @param Trigger $trigger
     * @return self
     */
    public function withTrigger(Trigger $trigger): self
    {
        $this->trigger = $trigger;
        return $this;
    }

    /**
     * @param AlertInfo $alertInfo
     * @return self
     */
    public function withAlertInfo(AlertInfo $alertInfo): self
    {
        $this->alertInfo = $alertInfo;
        return $this;
    }

    /**
     * @param PushNotification $pushNotification
     * @return self
     */
    public function withPushNotification(PushNotification $pushNotification): self
    {
        $this->pushNotification = $pushNotification;
        return $this;
    }

    public function build(): ReminderRequest
    {
        return ($this->constructor)(
            $this->requestTime,
            $this->trigger,
            $this->alertInfo,
            $this->pushNotification
        );
    }
}
