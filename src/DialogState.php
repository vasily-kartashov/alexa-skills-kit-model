<?php

namespace Alexa\Model;

use JsonSerializable;

final class DialogState implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'STARTED'     => new static('STARTED'),
                'IN_PROGRESS' => new static('IN_PROGRESS'),
                'COMPLETED'   => new static('COMPLETED')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function STARTED(): self
    {
        return static::values()['STARTED'];
    }

    public static function IN_PROGRESS(): self
    {
        return static::values()['IN_PROGRESS'];
    }

    public static function COMPLETED(): self
    {
        return static::values()['COMPLETED'];
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
