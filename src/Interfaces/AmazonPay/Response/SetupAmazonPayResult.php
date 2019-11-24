<?php

namespace Alexa\Model\Interfaces\AmazonPay\Response;

use Alexa\Model\Interfaces\AmazonPay\Model\Response\BillingAgreementDetails;
use JsonSerializable;

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
        return new class($constructor = function ($billingAgreementDetails) use ($instance): SetupAmazonPayResult {
            $instance->billingAgreementDetails = $billingAgreementDetails;
            return $instance;
        }) extends SetupAmazonPayResultBuilder {};
    }

    /**
     * @param BillingAgreementDetails $billingAgreementDetails
     * @return self
     */
    public static function ofBillingAgreementDetails(BillingAgreementDetails $billingAgreementDetails): SetupAmazonPayResult
    {
        $instance = new self;
        $instance->billingAgreementDetails = $billingAgreementDetails;
        return $instance;
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
