<?php

namespace Alexa\Model\Services\ListManagement;

use JsonSerializable;

final class ListState implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'active'   => new static('active'),
                'archived' => new static('archived')
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
        return static::values()['active'];
    }

    public static function ARCHIVED(): self
    {
        return static::values()['archived'];
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
