<?php

namespace Alexa\Model\Services\ReminderManagement;

use JsonSerializable;

final class PushNotificationStatus implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'ENABLED'  => new static('ENABLED'),
                'DISABLED' => new static('DISABLED')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function ENABLED(): self
    {
        return static::values()['ENABLED'];
    }

    public static function DISABLED(): self
    {
        return static::values()['DISABLED'];
    }

    /**
     * @param string $text
     * @return self|null
     */
    public static function fromValue(string $text)
    {
        return static::values()[$text] ?? null;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
