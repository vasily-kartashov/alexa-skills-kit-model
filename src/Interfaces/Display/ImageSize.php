<?php

namespace Alexa\Model\Interfaces\Display;

use \JsonSerializable;

final class ImageSize implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'X_SMALL' => new static('X_SMALL'),
                'SMALL' => new static('SMALL'),
                'MEDIUM' => new static('MEDIUM'),
                'LARGE' => new static('LARGE'),
                'X_LARGE' => new static('X_LARGE'),
                'null' => new static('null')
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
        return static::instances()['X_SMALL'];
    }

    public static function SMALL(): self
    {
        return static::instances()['SMALL'];
    }

    public static function MEDIUM(): self
    {
        return static::instances()['MEDIUM'];
    }

    public static function LARGE(): self
    {
        return static::instances()['LARGE'];
    }

    public static function X_LARGE(): self
    {
        return static::instances()['X_LARGE'];
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
