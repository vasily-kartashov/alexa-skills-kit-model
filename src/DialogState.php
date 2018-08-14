<?php

namespace Alexa\Model;

use \JsonSerializable;

final class DialogState implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'STARTED' => new static('STARTED'),
                'IN_PROGRESS' => new static('IN_PROGRESS'),
                'COMPLETED' => new static('COMPLETED')
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
        return static::instances()['STARTED'];
    }

    public static function IN_PROGRESS(): self
    {
        return static::instances()['IN_PROGRESS'];
    }

    public static function COMPLETED(): self
    {
        return static::instances()['COMPLETED'];
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
