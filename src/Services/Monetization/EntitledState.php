<?php

namespace Alexa\Model\Services\Monetization;

use \JsonSerializable;

final class EntitledState implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'ENTITLED' => new static('ENTITLED'),
                'NOT_ENTITLED' => new static('NOT_ENTITLED')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function ENTITLED(): self
    {
        return static::instances()['ENTITLED'];
    }

    public static function NOT_ENTITLED(): self
    {
        return static::instances()['NOT_ENTITLED'];
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
