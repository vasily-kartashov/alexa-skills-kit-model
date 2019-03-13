<?php

namespace Alexa\Model\Services\ReminderManagement;

use \JsonSerializable;

final class Status implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'ON' => new static('ON'),
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
        return static::instances()['ON'];
    }

    public static function COMPLETED(): self
    {
        return static::instances()['COMPLETED'];
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
