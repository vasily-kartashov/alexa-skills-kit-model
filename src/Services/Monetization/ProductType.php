<?php

namespace Alexa\Model\Services\Monetization;

use \JsonSerializable;
use \RuntimeException;

final class ProductType implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'SUBSCRIPTION' => new static('SUBSCRIPTION'),
                'ENTITLEMENT' => new static('ENTITLEMENT')
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
        return static::instances()['SUBSCRIPTION'];
    }

    public static function ENTITLEMENT(): self
    {
        return static::instances()['ENTITLEMENT'];
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
