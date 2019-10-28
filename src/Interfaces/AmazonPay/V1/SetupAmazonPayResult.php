<?php

namespace Alexa\Model\Interfaces\AmazonPay\V1;

use Alexa\Model\Interfaces\AmazonPay\Model\V1\BillingAgreementDetails;
use \JsonSerializable;

final class SetupAmazonPayResult implements JsonSerializable
{
    /** @var BillingAgreementDetails|null */
    private $billingAgreementDetails = null;

    protected function __construct()
    {
    }

    /**
     * @return BillingAgreementDetails|null
     */
    public function billingAgreementDetails()
    {
        return $this->billingAgreementDetails;
    }

    public static function builder(): SetupAmazonPayResultBuilder
    {
        $instance = new self;
        $constructor = function ($billingAgreementDetails) use ($instance): SetupAmazonPayResult {
            $instance->billingAgreementDetails = $billingAgreementDetails;
            return $instance;
        };
        return new class($constructor) extends SetupAmazonPayResultBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->billingAgreementDetails = isset($data['billingAgreementDetails']) ? BillingAgreementDetails::fromValue($data['billingAgreementDetails']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'billingAgreementDetails' => $this->billingAgreementDetails
        ]);
    }
}
