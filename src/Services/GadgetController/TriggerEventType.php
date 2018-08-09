<?php

namespace Alexa\Model\Services\GadgetController;

use \JsonSerializable;
use \RuntimeException;

final class TriggerEventType implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'buttonDown' => new static('buttonDown'),
                'buttonUp' => new static('buttonUp'),
                'none' => new static('none')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function BUTTON_DOWN(): self
    {
        return static::instances()['buttonDown'];
    }

    public static function BUTTON_UP(): self
    {
        return static::instances()['buttonUp'];
    }

    public static function NONE(): self
    {
        return static::instances()['none'];
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
