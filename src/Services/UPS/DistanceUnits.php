<?php

namespace Alexa\Model\Services\UPS;

use JsonSerializable;

final class DistanceUnits implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'METRIC'   => new static('METRIC'),
                'IMPERIAL' => new static('IMPERIAL')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function METRIC(): self
    {
        return static::values()['METRIC'];
    }

    public static function IMPERIAL(): self
    {
        return static::values()['IMPERIAL'];
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
