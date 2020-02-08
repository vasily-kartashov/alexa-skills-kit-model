<?php

namespace Alexa\Model\Services\GameEngine;

use JsonSerializable;

final class PatternRecognizerAnchorType implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'start'    => new static('start'),
                'end'      => new static('end'),
                'anywhere' => new static('anywhere')
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
        return static::values()['start'];
    }

    public static function END(): self
    {
        return static::values()['end'];
    }

    public static function ANYWHERE(): self
    {
        return static::values()['anywhere'];
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
