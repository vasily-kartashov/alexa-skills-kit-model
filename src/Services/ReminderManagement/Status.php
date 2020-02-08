<?php

namespace Alexa\Model\Services\ReminderManagement;

use JsonSerializable;

final class Status implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'ON'        => new static('ON'),
                'COMPLETED' => new static('COMPLETED')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function ON(): self
    {
        return static::values()['ON'];
    }

    public static function COMPLETED(): self
    {
        return static::values()['COMPLETED'];
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
