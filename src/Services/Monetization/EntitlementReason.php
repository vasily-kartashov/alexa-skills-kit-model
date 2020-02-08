<?php

namespace Alexa\Model\Services\Monetization;

use JsonSerializable;

final class EntitlementReason implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'PURCHASED'     => new static('PURCHASED'),
                'NOT_PURCHASED' => new static('NOT_PURCHASED'),
                'AUTO_ENTITLED' => new static('AUTO_ENTITLED')
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
        return static::values()['PURCHASED'];
    }

    public static function NOT_PURCHASED(): self
    {
        return static::values()['NOT_PURCHASED'];
    }

    public static function AUTO_ENTITLED(): self
    {
        return static::values()['AUTO_ENTITLED'];
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
