<?php

namespace Alexa\Model\Services\ReminderManagement;

use JsonSerializable;

final class RecurrenceFreq implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'WEEKLY' => new static('WEEKLY'),
                'DAILY'  => new static('DAILY')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function WEEKLY(): self
    {
        return static::values()['WEEKLY'];
    }

    public static function DAILY(): self
    {
        return static::values()['DAILY'];
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
