<?php

namespace Alexa\Model\Interfaces\Viewport;

use JsonSerializable;

final class Mode implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'AUTO' => new static('AUTO'),
                'HUB' => new static('HUB'),
                'MOBILE' => new static('MOBILE'),
                'PC' => new static('PC'),
                'TV' => new static('TV'),
                'null' => new static('null')
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
        return static::instances()['AUTO'];
    }

    public static function HUB(): self
    {
        return static::instances()['HUB'];
    }

    public static function MOBILE(): self
    {
        return static::instances()['MOBILE'];
    }

    public static function PC(): self
    {
        return static::instances()['PC'];
    }

    public static function TV(): self
    {
        return static::instances()['TV'];
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
