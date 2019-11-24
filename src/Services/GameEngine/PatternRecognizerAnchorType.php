<?php

namespace Alexa\Model\Services\GameEngine;

use JsonSerializable;

final class PatternRecognizerAnchorType implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'start' => new static('start'),
                'end' => new static('end'),
                'anywhere' => new static('anywhere'),
                'null' => new static('null')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function START(): self
    {
        return static::instances()['start'];
    }

    public static function END(): self
    {
        return static::instances()['end'];
    }

    public static function ANYWHERE(): self
    {
        return static::instances()['anywhere'];
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