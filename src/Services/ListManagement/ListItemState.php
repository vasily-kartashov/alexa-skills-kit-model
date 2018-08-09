<?php

namespace Alexa\Model\Services\ListManagement;

use \JsonSerializable;
use \RuntimeException;

final class ListItemState implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'active' => new static('active'),
                'completed' => new static('completed')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function ACTIVE(): self
    {
        return static::instances()['active'];
    }

    public static function COMPLETED(): self
    {
        return static::instances()['completed'];
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
