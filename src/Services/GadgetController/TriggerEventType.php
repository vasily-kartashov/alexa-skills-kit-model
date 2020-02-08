<?php

namespace Alexa\Model\Services\GadgetController;

use JsonSerializable;

final class TriggerEventType implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'buttonDown' => new static('buttonDown'),
                'buttonUp'   => new static('buttonUp'),
                'none'       => new static('none')
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
        return static::values()['buttonDown'];
    }

    public static function BUTTON_UP(): self
    {
        return static::values()['buttonUp'];
    }

    public static function NONE(): self
    {
        return static::values()['none'];
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
