<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\Request;

use JsonSerializable;

final class BillingAgreementType implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'CustomerInitiatedTransaction' => new static('CustomerInitiatedTransaction'),
                'MerchantInitiatedTransaction' => new static('MerchantInitiatedTransaction')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function CUSTOMER_INITIATED_TRANSACTION(): self
    {
        return static::values()['CustomerInitiatedTransaction'];
    }

    public static function MERCHANT_INITIATED_TRANSACTION(): self
    {
        return static::values()['MerchantInitiatedTransaction'];
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
