<?php

namespace Alexa\Model\Interfaces\Display;

use JsonSerializable;

final class ImageSize implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'X_SMALL' => new static('X_SMALL'),
                'SMALL'   => new static('SMALL'),
                'MEDIUM'  => new static('MEDIUM'),
                'LARGE'   => new static('LARGE'),
                'X_LARGE' => new static('X_LARGE')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function X_SMALL(): self
    {
        return static::values()['X_SMALL'];
    }

    public static function SMALL(): self
    {
        return static::values()['SMALL'];
    }

    public static function MEDIUM(): self
    {
        return static::values()['MEDIUM'];
    }

    public static function LARGE(): self
    {
        return static::values()['LARGE'];
    }

    public static function X_LARGE(): self
    {
        return static::values()['X_LARGE'];
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
