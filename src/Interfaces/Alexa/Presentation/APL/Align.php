<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class Align implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'center'  => new static('center'),
                'first'   => new static('first'),
                'last'    => new static('last'),
                'visible' => new static('visible')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function CENTER(): self
    {
        return static::values()['center'];
    }

    public static function FIRST(): self
    {
        return static::values()['first'];
    }

    public static function LAST(): self
    {
        return static::values()['last'];
    }

    public static function VISIBLE(): self
    {
        return static::values()['visible'];
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
