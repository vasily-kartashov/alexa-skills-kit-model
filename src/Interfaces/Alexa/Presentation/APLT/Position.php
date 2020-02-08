<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

use JsonSerializable;

final class Position implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'absolute' => new static('absolute'),
                'relative' => new static('relative')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function ABSOLUTE(): self
    {
        return static::values()['absolute'];
    }

    public static function RELATIVE(): self
    {
        return static::values()['relative'];
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
