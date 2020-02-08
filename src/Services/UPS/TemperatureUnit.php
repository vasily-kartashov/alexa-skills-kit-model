<?php

namespace Alexa\Model\Services\UPS;

use JsonSerializable;

final class TemperatureUnit implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'CELSIUS'    => new static('CELSIUS'),
                'FAHRENHEIT' => new static('FAHRENHEIT')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function CELSIUS(): self
    {
        return static::values()['CELSIUS'];
    }

    public static function FAHRENHEIT(): self
    {
        return static::values()['FAHRENHEIT'];
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
