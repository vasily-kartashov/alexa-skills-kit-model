<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

use JsonSerializable;

final class SellerBillingAgreementAttributes implements JsonSerializable
{
    /** @var string|null */
    private $sellerBillingAgreementId = null;

    /** @var string|null */
    private $storeName = null;

    /** @var string|null */
    private $customInformation = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function sellerBillingAgreementId()
    {
        return $this->sellerBillingAgreementId;
    }

    /**
     * @return string|null
     */
    public function storeName()
    {
        return $this->storeName;
    }

    /**
     * @return string|null
     */
    public function customInformation()
    {
        return $this->customInformation;
    }

    public static function builder(): SellerBillingAgreementAttributesBuilder
    {
        $instance = new self;
        return new class($constructor = function ($sellerBillingAgreementId, $storeName, $customInformation) use ($instance): SellerBillingAgreementAttributes {
            $instance->sellerBillingAgreementId = $sellerBillingAgreementId;
            $instance->storeName = $storeName;
            $instance->customInformation = $customInformation;
            return $instance;
        }) extends SellerBillingAgreementAttributesBuilder {};
    }

    /**
     * @param string $sellerBillingAgreementId
     * @return self
     */
    public static function ofSellerBillingAgreementId(string $sellerBillingAgreementId): SellerBillingAgreementAttributes
    {
        $instance = new self;
        $instance->sellerBillingAgreementId = $sellerBillingAgreementId;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->sellerBillingAgreementId = isset($data['sellerBillingAgreementId']) ? ((string) $data['sellerBillingAgreementId']) : null;
        $instance->storeName = isset($data['storeName']) ? ((string) $data['storeName']) : null;
        $instance->customInformation = isset($data['customInformation']) ? ((string) $data['customInformation']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'sellerBillingAgreementId' => $this->sellerBillingAgreementId,
            'storeName' => $this->storeName,
            'customInformation' => $this->customInformation
        ]);
    }
}
