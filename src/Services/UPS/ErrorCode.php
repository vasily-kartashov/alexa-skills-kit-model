<?php

namespace Alexa\Model\Services\UPS;

use JsonSerializable;

final class ErrorCode implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'INVALID_KEY'        => new static('INVALID_KEY'),
                'INVALID_VALUE'      => new static('INVALID_VALUE'),
                'INVALID_TOKEN'      => new static('INVALID_TOKEN'),
                'INVALID_URI'        => new static('INVALID_URI'),
                'DEVICE_UNREACHABLE' => new static('DEVICE_UNREACHABLE'),
                'UNKNOWN_ERROR'      => new static('UNKNOWN_ERROR')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function INVALID_KEY(): self
    {
        return static::values()['INVALID_KEY'];
    }

    public static function INVALID_VALUE(): self
    {
        return static::values()['INVALID_VALUE'];
    }

    public static function INVALID_TOKEN(): self
    {
        return static::values()['INVALID_TOKEN'];
    }

    public static function INVALID_URI(): self
    {
        return static::values()['INVALID_URI'];
    }

    public static function DEVICE_UNREACHABLE(): self
    {
        return static::values()['DEVICE_UNREACHABLE'];
    }

    public static function UNKNOWN_ERROR(): self
    {
        return static::values()['UNKNOWN_ERROR'];
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
