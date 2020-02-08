<?php

namespace Alexa\Model\Services\Monetization;

use JsonSerializable;

final class PurchasableState implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'PURCHASABLE'     => new static('PURCHASABLE'),
                'NOT_PURCHASABLE' => new static('NOT_PURCHASABLE')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function PURCHASABLE(): self
    {
        return static::values()['PURCHASABLE'];
    }

    public static function NOT_PURCHASABLE(): self
    {
        return static::values()['NOT_PURCHASABLE'];
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
