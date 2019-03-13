<?php

namespace Alexa\Model\Services\ReminderManagement;

abstract class PushNotificationBuilder
{
    /** @var callable */
    private $constructor;

    /** @var PushNotificationStatus|null */
    private $status = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $status
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
