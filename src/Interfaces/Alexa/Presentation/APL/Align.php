<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class Align implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'center' => new static('center'),
                'first' => new static('first'),
                'last' => new static('last'),
                'visible' => new static('visible'),
                'null' => new static('null')
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
        return static::instances()['center'];
    }

    public static function FIRST(): self
    {
        return static::instances()['first'];
    }

    public static function LAST(): self
    {
        return static::instances()['last'];
    }

    public static function VISIBLE(): self
    {
        return static::instances()['visible'];
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
