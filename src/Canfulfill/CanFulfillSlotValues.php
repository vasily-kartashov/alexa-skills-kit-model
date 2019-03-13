<?php

namespace Alexa\Model\Canfulfill;

use \JsonSerializable;

final class CanFulfillSlotValues implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'YES' => new static('YES'),
                'NO' => new static('NO')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function YES(): self
    {
        return static::instances()['YES'];
    }

    public static function NO(): self
    {
        return static::instances()['NO'];
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
