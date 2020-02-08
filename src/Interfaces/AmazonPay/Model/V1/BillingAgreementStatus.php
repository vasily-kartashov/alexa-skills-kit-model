<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

use JsonSerializable;

final class BillingAgreementStatus implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'CANCELED'  => new static('CANCELED'),
                'CLOSED'    => new static('CLOSED'),
                'DRAFT'     => new static('DRAFT'),
                'OPEN'      => new static('OPEN'),
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
        return static::values()['CANCELED'];
    }

    public static function CLOSED(): self
    {
        return static::values()['CLOSED'];
    }

    public static function DRAFT(): self
    {
        return static::values()['DRAFT'];
    }

    public static function OPEN(): self
    {
        return static::values()['OPEN'];
    }

    public static function SUSPENDED(): self
    {
        return static::values()['SUSPENDED'];
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
