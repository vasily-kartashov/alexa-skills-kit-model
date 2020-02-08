<?php

namespace Alexa\Model\Services\ReminderManagement;

use JsonSerializable;

final class TriggerType implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'SCHEDULED_ABSOLUTE' => new static('SCHEDULED_ABSOLUTE'),
                'SCHEDULED_RELATIVE' => new static('SCHEDULED_RELATIVE')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function SCHEDULED_ABSOLUTE(): self
    {
        return static::values()['SCHEDULED_ABSOLUTE'];
    }

    public static function SCHEDULED_RELATIVE(): self
    {
        return static::values()['SCHEDULED_RELATIVE'];
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
