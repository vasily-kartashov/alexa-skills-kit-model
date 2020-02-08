<?php

namespace Alexa\Model\Services\ReminderManagement;

use JsonSerializable;

final class RecurrenceDay implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'SU' => new static('SU'),
                'MO' => new static('MO'),
                'TU' => new static('TU'),
                'WE' => new static('WE'),
                'TH' => new static('TH'),
                'FR' => new static('FR'),
                'SA' => new static('SA')
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
        return static::values()['SU'];
    }

    public static function MO(): self
    {
        return static::values()['MO'];
    }

    public static function TU(): self
    {
        return static::values()['TU'];
    }

    public static function WE(): self
    {
        return static::values()['WE'];
    }

    public static function TH(): self
    {
        return static::values()['TH'];
    }

    public static function FR(): self
    {
        return static::values()['FR'];
    }

    public static function SA(): self
    {
        return static::values()['SA'];
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
