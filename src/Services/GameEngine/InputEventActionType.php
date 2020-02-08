<?php

namespace Alexa\Model\Services\GameEngine;

use JsonSerializable;

final class InputEventActionType implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'down' => new static('down'),
                'up'   => new static('up')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function DOWN(): self
    {
        return static::values()['down'];
    }

    public static function UP(): self
    {
        return static::values()['up'];
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
