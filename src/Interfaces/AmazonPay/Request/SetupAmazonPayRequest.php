<?php

namespace Alexa\Model\Interfaces\AmazonPay\Request;

use Alexa\Model\Interfaces\AmazonPay\Model\Request\BaseAmazonPayEntity;
use Alexa\Model\Interfaces\AmazonPay\Model\Request\BillingAgreementAttributes;
use JsonSerializable;

final class SetupAmazonPayRequest extends BaseAmazonPayEntity implements JsonSerializable
{
    const TYPE = 'SetupAmazonPayRequest';

    /** @var string|null */
    private $sellerId = null;

    /** @var string|null */
    private $countryOfEstablishment = null;

    /** @var string|null */
    private $ledgerCurrency = null;

    /** @var string|null */
    private $checkoutLanguage = null;

    /** @var BillingAgreementAttributes|null */
    private $billingAgreementAttributes = null;

    /** @var bool|null */
    private $needAmazonShippingAddress = null;

    /** @var bool|null */
    private $sandboxMode = null;

    /** @var string|null */
    private $sandboxCustomerEmailId = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function sellerId()
    {
        return $this->sellerId;
    }

    /**
     * @return string|null
     */
    public function countryOfEstablishment()
    {
        return $this->countryOfEstablishment;
    }

    /**
     * @return string|null
     */
    public function ledgerCurrency()
    {
        return $this->ledgerCurrency;
    }

    /**
     * @return string|null
     */
    public function checkoutLanguage()
    {
        return $this->checkoutLanguage;
    }

    /**
     * @return BillingAgreementAttributes|null
     */
    public function billingAgreementAttributes()
    {
        return $this->billingAgreementAttributes;
    }

    /**
     * @return bool|null
     */
    public function needAmazonShippingAddress()
    {
        return $this->needAmazonShippingAddress;
    }

    /**
     * @return bool|null
     */
    public function sandboxMode()
    {
        return $this->sandboxMode;
    }

    /**
     * @return string|null
     */
    public function sandboxCustomerEmailId()
    {
        return $this->sandboxCustomerEmailId;
    }

    public static function builder(): SetupAmazonPayRequestBuilder
    {
        $instance = new self;
        return new class($constructor = function ($sellerId, $countryOfEstablishment, $ledgerCurrency, $checkoutLanguage, $billingAgreementAttributes, $needAmazonShippingAddress, $sandboxMode, $sandboxCustomerEmailId) use ($instance): SetupAmazonPayRequest {
            $instance->sellerId = $sellerId;
            $instance->countryOfEstablishment = $countryOfEstablishment;
            $instance->ledgerCurrency = $ledgerCurrency;
            $instance->checkoutLanguage = $checkoutLanguage;
            $instance->billingAgreementAttributes = $billingAgreementAttributes;
            $instance->needAmazonShippingAddress = $needAmazonShippingAddress;
            $instance->sandboxMode = $sandboxMode;
            $instance->sandboxCustomerEmailId = $sandboxCustomerEmailId;
            return $instance;
        }) extends SetupAmazonPayRequestBuilder {};
    }

    /**
     * @param string $sellerId
     * @return self
     */
    public static function ofSellerId(string $sellerId): SetupAmazonPayRequest
    {
        $instance = new self;
        $instance->sellerId = $sellerId;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->sellerId = isset($data['sellerId']) ? ((string) $data['sellerId']) : null;
        $instance->countryOfEstablishment = isset($data['countryOfEstablishment']) ? ((string) $data['countryOfEstablishment']) : null;
        $instance->ledgerCurrency = isset($data['ledgerCurrency']) ? ((string) $data['ledgerCurrency']) : null;
        $instance->checkoutLanguage = isset($data['checkoutLanguage']) ? ((string) $data['checkoutLanguage']) : null;
        $instance->billingAgreementAttributes = isset($data['billingAgreementAttributes']) ? BillingAgreementAttributes::fromValue($data['billingAgreementAttributes']) : null;
        $instance->needAmazonShippingAddress = isset($data['needAmazonShippingAddress']) ? ((bool) $data['needAmazonShippingAddress']) : null;
        $instance->sandboxMode = isset($data['sandboxMode']) ? ((bool) $data['sandboxMode']) : null;
        $instance->sandboxCustomerEmailId = isset($data['sandboxCustomerEmailId']) ? ((string) $data['sandboxCustomerEmailId']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'sellerId' => $this->sellerId,
            'countryOfEstablishment' => $this->countryOfEstablishment,
            'ledgerCurrency' => $this->ledgerCurrency,
            'checkoutLanguage' => $this->checkoutLanguage,
            'billingAgreementAttributes' => $this->billingAgreementAttributes,
            'needAmazonShippingAddress' => $this->needAmazonShippingAddress,
            'sandboxMode' => $this->sandboxMode,
            'sandboxCustomerEmailId' => $this->sandboxCustomerEmailId
        ]);
    }
}
