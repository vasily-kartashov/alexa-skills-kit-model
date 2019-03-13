<?php

namespace Alexa\Model\Services\ReminderManagement;

use \JsonSerializable;

final class PushNotification implements JsonSerializable
{
    /** @var PushNotificationStatus|null */
    private $status = null;

    protected function __construct()
    {
    }

    /**
     * @return PushNotificationStatus|null
     */
    public function status()
    {
        return $this->status;
    }

    public static function builder(): PushNotificationBuilder
    {
        $instance = new self();
        $constructor = function ($status) use ($instance): PushNotification {
            $instance->status = $status;
            return $instance;
        };
        return new class($constructor) extends PushNotificationBuilder
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
        $instance->status = isset($data['status']) ? PushNotificationStatus::fromValue($data['status']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'status' => $this->status
        ]);
    }
}
