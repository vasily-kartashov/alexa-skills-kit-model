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
    protected $version = null;

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
    public function version()
    {
        return $this->version;
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
        $instance = null;
        switch ($data['@type']) {
            case AuthorizeAttributes::TYPE:
                $instance = AuthorizeAttributes::fromValue($data);
                break;
            case SellerBillingAgreementAttributes::TYPE:
                $instance = SellerBillingAgreementAttributes::fromValue($data);
                break;
            case SetupAmazonPayRequest::TYPE:
                $instance = SetupAmazonPayRequest::fromValue($data);
                break;
            case ProviderCredit::TYPE:
                $instance = ProviderCredit::fromValue($data);
                break;
            case Price::TYPE:
                $instance = Price::fromValue($data);
                break;
            case ChargeAmazonPayRequest::TYPE:
                $instance = ChargeAmazonPayRequest::fromValue($data);
                break;
            case BillingAgreementAttributes::TYPE:
                $instance = BillingAgreementAttributes::fromValue($data);
                break;
            case SellerOrderAttributes::TYPE:
                $instance = SellerOrderAttributes::fromValue($data);
                break;
            case ProviderAttributes::TYPE:
                $instance = ProviderAttributes::fromValue($data);
                break;
        }
        if ($instance !== null) {
            if (isset($data['@version'])) {
                $instance->version = $data['@version'];
            }
        }
        return $instance;
    }
}
