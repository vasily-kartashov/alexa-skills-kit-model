<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class PushNotificationBuilder
{
    /** @var callable */
    private $constructor;

    /** @var PushNotificationStatus|null */
    private $status = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param PushNotificationStatus $status
     * @return self
     */
    public function withStatus(PushNotificationStatus $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function build(): PushNotification
    {
        return ($this->constructor)(
            $this->status
        );
    }
}
