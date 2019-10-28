<?php

namespace Alexa\Model\ER\Dynamic;

use \JsonSerializable;

final class UpdateBehavior implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'REPLACE' => new static('REPLACE'),
                'CLEAR' => new static('CLEAR')
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
        return static::instances()['REPLACE'];
    }

    public static function CLEAR(): self
    {
        return static::instances()['CLEAR'];
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
