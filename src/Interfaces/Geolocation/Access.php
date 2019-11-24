<?php

namespace Alexa\Model\Interfaces\Geolocation;

use \JsonSerializable;

final class Access implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'ENABLED' => new static('ENABLED'),
                'DISABLED' => new static('DISABLED'),
                'UNKNOWN' => new static('UNKNOWN'),
                'null' => new static('null')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function ENABLED(): self
    {
        return static::instances()['ENABLED'];
    }

    public static function DISABLED(): self
    {
        return static::instances()['DISABLED'];
    }

    public static function UNKNOWN(): self
    {
        return static::instances()['UNKNOWN'];
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
