<?php

namespace Alexa\Model;

use \JsonSerializable;

final class SlotConfirmationStatus implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'NONE' => new static('NONE'),
                'DENIED' => new static('DENIED'),
                'CONFIRMED' => new static('CONFIRMED'),
                'null' => new static('null')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function NONE(): self
    {
        return static::instances()['NONE'];
    }

    public static function DENIED(): self
    {
        return static::instances()['DENIED'];
    }

    public static function CONFIRMED(): self
    {
        return static::instances()['CONFIRMED'];
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
