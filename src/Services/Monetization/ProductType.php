<?php

namespace Alexa\Model\Services\Monetization;

use JsonSerializable;

final class ProductType implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'SUBSCRIPTION' => new static('SUBSCRIPTION'),
                'ENTITLEMENT'  => new static('ENTITLEMENT'),
                'CONSUMABLE'   => new static('CONSUMABLE')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function SUBSCRIPTION(): self
    {
        return static::values()['SUBSCRIPTION'];
    }

    public static function ENTITLEMENT(): self
    {
        return static::values()['ENTITLEMENT'];
    }

    public static function CONSUMABLE(): self
    {
        return static::values()['CONSUMABLE'];
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
