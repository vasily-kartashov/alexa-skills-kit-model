<?php

namespace Alexa\Model\Services\ReminderManagement;

use \JsonSerializable;

final class RecurrenceDay implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'SU' => new static('SU'),
                'MO' => new static('MO'),
                'TU' => new static('TU'),
                'WE' => new static('WE'),
                'TH' => new static('TH'),
                'FR' => new static('FR'),
                'SA' => new static('SA'),
                'null' => new static('null')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function SU(): self
    {
        return static::instances()['SU'];
    }

    public static function MO(): self
    {
        return static::instances()['MO'];
    }

    public static function TU(): self
    {
        return static::instances()['TU'];
    }

    public static function WE(): self
    {
        return static::instances()['WE'];
    }

    public static function TH(): self
    {
        return static::instances()['TH'];
    }

    public static function FR(): self
    {
        return static::instances()['FR'];
    }

    public static function SA(): self
    {
        return static::instances()['SA'];
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
