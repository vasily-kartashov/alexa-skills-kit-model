<?php

namespace Alexa\Model;

use JsonSerializable;

final class IntentConfirmationStatus implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'NONE'      => new static('NONE'),
                'DENIED'    => new static('DENIED'),
                'CONFIRMED' => new static('CONFIRMED')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function NONE(): self
    {
        return static::values()['NONE'];
    }

    public static function DENIED(): self
    {
        return static::values()['DENIED'];
    }

    public static function CONFIRMED(): self
    {
        return static::values()['CONFIRMED'];
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
