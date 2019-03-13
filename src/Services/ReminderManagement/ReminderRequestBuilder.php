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

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withRequestTime(DateTime $requestTime): self
    {
        $this->requestTime = $requestTime;
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
