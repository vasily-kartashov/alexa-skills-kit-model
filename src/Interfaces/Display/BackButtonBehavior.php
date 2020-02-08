<?php

namespace Alexa\Model\Interfaces\Display;

use JsonSerializable;

final class BackButtonBehavior implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'HIDDEN'  => new static('HIDDEN'),
                'VISIBLE' => new static('VISIBLE')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function HIDDEN(): self
    {
        return static::values()['HIDDEN'];
    }

    public static function VISIBLE(): self
    {
        return static::values()['VISIBLE'];
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
