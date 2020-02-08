<?php

namespace Alexa\Model\Interfaces\Geolocation;

use JsonSerializable;

final class Status implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'RUNNING' => new static('RUNNING'),
                'STOPPED' => new static('STOPPED')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function RUNNING(): self
    {
        return static::values()['RUNNING'];
    }

    public static function STOPPED(): self
    {
        return static::values()['STOPPED'];
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
