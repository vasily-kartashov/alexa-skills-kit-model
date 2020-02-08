<?php

namespace Alexa\Model;

use JsonSerializable;

final class PermissionStatus implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'GRANTED' => new static('GRANTED'),
                'DENIED'  => new static('DENIED')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function GRANTED(): self
    {
        return static::values()['GRANTED'];
    }

    public static function DENIED(): self
    {
        return static::values()['DENIED'];
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
