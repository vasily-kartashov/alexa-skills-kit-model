<?php

namespace Alexa\Model\ER\Dynamic;

use JsonSerializable;

final class UpdateBehavior implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'REPLACE' => new static('REPLACE'),
                'CLEAR'   => new static('CLEAR')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function REPLACE(): self
    {
        return static::values()['REPLACE'];
    }

    public static function CLEAR(): self
    {
        return static::values()['CLEAR'];
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
