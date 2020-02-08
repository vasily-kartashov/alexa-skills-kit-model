<?php

namespace Alexa\Model\CanFulfill;

use JsonSerializable;

final class CanUnderstandSlotValues implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'YES'   => new static('YES'),
                'NO'    => new static('NO'),
                'MAYBE' => new static('MAYBE')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function YES(): self
    {
        return static::values()['YES'];
    }

    public static function NO(): self
    {
        return static::values()['NO'];
    }

    public static function MAYBE(): self
    {
        return static::values()['MAYBE'];
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
