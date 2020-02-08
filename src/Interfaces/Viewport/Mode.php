<?php

namespace Alexa\Model\Interfaces\Viewport;

use JsonSerializable;

final class Mode implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'AUTO'   => new static('AUTO'),
                'HUB'    => new static('HUB'),
                'MOBILE' => new static('MOBILE'),
                'PC'     => new static('PC'),
                'TV'     => new static('TV')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function AUTO(): self
    {
        return static::values()['AUTO'];
    }

    public static function HUB(): self
    {
        return static::values()['HUB'];
    }

    public static function MOBILE(): self
    {
        return static::values()['MOBILE'];
    }

    public static function PC(): self
    {
        return static::values()['PC'];
    }

    public static function TV(): self
    {
        return static::values()['TV'];
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
