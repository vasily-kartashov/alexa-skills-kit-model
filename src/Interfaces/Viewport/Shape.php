<?php

namespace Alexa\Model\Interfaces\Viewport;

use JsonSerializable;

final class Shape implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'RECTANGLE' => new static('RECTANGLE'),
                'ROUND'     => new static('ROUND')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function RECTANGLE(): self
    {
        return static::values()['RECTANGLE'];
    }

    public static function ROUND(): self
    {
        return static::values()['ROUND'];
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
