<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

use JsonSerializable;

final class BillingAgreementAttributes implements JsonSerializable
{
    /** @var string|null */
    private $platformId = null;

    /** @var string|null */
    private $sellerNote = null;

    /** @var SellerBillingAgreementAttributes|null */
    private $sellerBillingAgreementAttributes = null;

    /** @var BillingAgreementType|null */
    private $billingAgreementType = null;

    /** @var Price|null */
    private $subscriptionAmount = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function platformId()
    {
        return $this->platformId;
    }

    /**
     * @return string|null
     */
    public function sellerNote()
    {
        return $this->sellerNote;
    }

    /**
     * @return SellerBillingAgreementAttributes|null
     */
    public function sellerBillingAgreementAttributes()
    {
        return $this->sellerBillingAgreementAttributes;
    }

    /**
     * @return BillingAgreementType|null
     */
    public function billingAgreementType()
    {
        return $this->billingAgreementType;
    }

    /**
     * @return Price|null
     */
    public function subscriptionAmount()
    {
        return $this->subscriptionAmount;
    }

    public static function builder(): BillingAgreementAttributesBuilder
    {
        $instance = new self;
        return new class($constructor = function ($platformId, $sellerNote, $sellerBillingAgreementAttributes, $billingAgreementType, $subscriptionAmount) use ($instance): BillingAgreementAttributes {
            $instance->platformId = $platformId;
            $instance->sellerNote = $sellerNote;
            $instance->sellerBillingAgreementAttributes = $sellerBillingAgreementAttributes;
            $instance->billingAgreementType = $billingAgreementType;
            $instance->subscriptionAmount = $subscriptionAmount;
            return $instance;
        }) extends BillingAgreementAttributesBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->platformId = isset($data['platformId']) ? ((string) $data['platformId']) : null;
        $instance->sellerNote = isset($data['sellerNote']) ? ((string) $data['sellerNote']) : null;
        $instance->sellerBillingAgreementAttributes = isset($data['sellerBillingAgreementAttributes']) ? SellerBillingAgreementAttributes::fromValue($data['sellerBillingAgreementAttributes']) : null;
        $instance->billingAgreementType = isset($data['billingAgreementType']) ? BillingAgreementType::fromValue($data['billingAgreementType']) : null;
        $instance->subscriptionAmount = isset($data['subscriptionAmount']) ? Price::fromValue($data['subscriptionAmount']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'platformId' => $this->platformId,
            'sellerNote' => $this->sellerNote,
            'sellerBillingAgreementAttributes' => $this->sellerBillingAgreementAttributes,
            'billingAgreementType' => $this->billingAgreementType,
            'subscriptionAmount' => $this->subscriptionAmount
        ]);
    }
}
