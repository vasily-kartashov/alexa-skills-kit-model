<?php

namespace Alexa\Model\Interfaces\AmazonPay\V1;

use Alexa\Model\Interfaces\AmazonPay\Model\V1\BillingAgreementAttributes;
use \JsonSerializable;

final class SetupAmazonPay implements JsonSerializable
{
    /** @var string|null */
    private $consentToken = null;

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
    }

    /**
     * @return string|null
     */
    public function consentToken()
    {
        return $this->consentToken;
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

    public static function builder(): SetupAmazonPayBuilder
    {
        $instance = new self();
        $constructor = function ($consentToken, $sellerId, $countryOfEstablishment, $ledgerCurrency, $checkoutLanguage, $billingAgreementAttributes, $needAmazonShippingAddress, $sandboxMode, $sandboxCustomerEmailId) use ($instance): SetupAmazonPay {
            $instance->consentToken = $consentToken;
            $instance->sellerId = $sellerId;
            $instance->countryOfEstablishment = $countryOfEstablishment;
            $instance->ledgerCurrency = $ledgerCurrency;
            $instance->checkoutLanguage = $checkoutLanguage;
            $instance->billingAgreementAttributes = $billingAgreementAttributes;
            $instance->needAmazonShippingAddress = $needAmazonShippingAddress;
            $instance->sandboxMode = $sandboxMode;
            $instance->sandboxCustomerEmailId = $sandboxCustomerEmailId;
            return $instance;
        };
        return new class($constructor) extends SetupAmazonPayBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->consentToken = isset($data['consentToken']) ? ((string) $data['consentToken']) : null;
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
            'consentToken' => $this->consentToken,
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
