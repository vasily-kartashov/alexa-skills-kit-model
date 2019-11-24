<?php

namespace Alexa\Model\Services\ReminderManagement;

use \JsonSerializable;

final class TriggerType implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'SCHEDULED_ABSOLUTE' => new static('SCHEDULED_ABSOLUTE'),
                'SCHEDULED_RELATIVE' => new static('SCHEDULED_RELATIVE'),
                'null' => new static('null')
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
        return static::instances()['SCHEDULED_ABSOLUTE'];
    }

    public static function SCHEDULED_RELATIVE(): self
    {
        return static::instances()['SCHEDULED_RELATIVE'];
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
