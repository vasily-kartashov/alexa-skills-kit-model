<?php

namespace Alexa\Model\Services\ReminderManagement;

use JsonSerializable;

final class RecurrenceFreq implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'WEEKLY' => new static('WEEKLY'),
                'DAILY' => new static('DAILY'),
                'null' => new static('null')
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
        return static::instances()['WEEKLY'];
    }

    public static function DAILY(): self
    {
        return static::instances()['DAILY'];
    }

    public static function NULL(): self
    {
        return static::instances()['null'];
    }

    /**
     * @param string $text
     * @return self|null
     */
    public static function fromValue(string $text)
    {
        return static::instances()[$text] ?? null;
    }

    /**
     * @return self[]
     */
    public static function values()
    {
        return static::instances();
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