<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\Request;

use Alexa\Model\Interfaces\AmazonPay\Request\ChargeAmazonPayRequest;
use Alexa\Model\Interfaces\AmazonPay\Request\SetupAmazonPayRequest;
use \JsonSerializable;

abstract class BaseAmazonPayEntity implements JsonSerializable
{
    /** @var string|null */
    protected $type = null;

    /** @var string|null */
    protected $@version = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function @version()
    {
        return $this->@version;
    }

    /**
     * @param array $data
     * @return self|null
     */
    public static function fromValue(array $data)
    {
        if (!isset($data['@type'])) {
            return null;
        }
        switch ($data['@type']) {
            case AuthorizeAttributes::@TYPE:
                return AuthorizeAttributes::fromValue($data);
            case SellerBillingAgreementAttributes::@TYPE:
                return SellerBillingAgreementAttributes::fromValue($data);
            case SetupAmazonPayRequest::@TYPE:
                return SetupAmazonPayRequest::fromValue($data);
            case ProviderCredit::@TYPE:
                return ProviderCredit::fromValue($data);
            case Price::@TYPE:
                return Price::fromValue($data);
            case ChargeAmazonPayRequest::@TYPE:
                return ChargeAmazonPayRequest::fromValue($data);
            case BillingAgreementAttributes::@TYPE:
                return BillingAgreementAttributes::fromValue($data);
            case SellerOrderAttributes::@TYPE:
                return SellerOrderAttributes::fromValue($data);
            case ProviderAttributes::@TYPE:
                return ProviderAttributes::fromValue($data);
            default:
                return null;
        }
    }
}
