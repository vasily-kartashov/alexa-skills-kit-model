<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

use \JsonSerializable;

final class BillingAgreementStatus implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'CANCELED' => new static('CANCELED'),
                'CLOSED' => new static('CLOSED'),
                'DRAFT' => new static('DRAFT'),
                'OPEN' => new static('OPEN'),
                'SUSPENDED' => new static('SUSPENDED')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function CANCELED(): self
    {
        return static::instances()['CANCELED'];
    }

    public static function CLOSED(): self
    {
        return static::instances()['CLOSED'];
    }

    public static function DRAFT(): self
    {
        return static::instances()['DRAFT'];
    }

    public static function OPEN(): self
    {
        return static::instances()['OPEN'];
    }

    public static function SUSPENDED(): self
    {
        return static::instances()['SUSPENDED'];
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
