<?php

namespace Alexa\Model\Services\Monetization;

use JsonSerializable;

final class EntitlementReason implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'PURCHASED' => new static('PURCHASED'),
                'NOT_PURCHASED' => new static('NOT_PURCHASED'),
                'AUTO_ENTITLED' => new static('AUTO_ENTITLED'),
                'null' => new static('null')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function PURCHASED(): self
    {
        return static::instances()['PURCHASED'];
    }

    public static function NOT_PURCHASED(): self
    {
        return static::instances()['NOT_PURCHASED'];
    }

    public static function AUTO_ENTITLED(): self
    {
        return static::instances()['AUTO_ENTITLED'];
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
