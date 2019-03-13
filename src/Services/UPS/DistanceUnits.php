<?php

namespace Alexa\Model\Services\UPS;

use \JsonSerializable;

final class DistanceUnits implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'METRIC' => new static('METRIC'),
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
        return static::instances()['METRIC'];
    }

    public static function IMPERIAL(): self
    {
        return static::instances()['IMPERIAL'];
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
