<?php

namespace Alexa\Model\Services\ListManagement;

use JsonSerializable;

final class ListItemState implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'active'    => new static('active'),
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
        return static::values()['active'];
    }

    public static function COMPLETED(): self
    {
        return static::values()['completed'];
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
