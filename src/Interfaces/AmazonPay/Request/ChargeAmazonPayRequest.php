<?php

namespace Alexa\Model\Interfaces\AmazonPay\Request;

use Alexa\Model\Interfaces\AmazonPay\Model\Request\AuthorizeAttributes;
use Alexa\Model\Interfaces\AmazonPay\Model\Request\BaseAmazonPayEntity;
use Alexa\Model\Interfaces\AmazonPay\Model\Request\PaymentAction;
use Alexa\Model\Interfaces\AmazonPay\Model\Request\ProviderAttributes;
use Alexa\Model\Interfaces\AmazonPay\Model\Request\SellerOrderAttributes;
use \JsonSerializable;

final class ChargeAmazonPayRequest extends BaseAmazonPayEntity implements JsonSerializable
{
    const TYPE = 'ChargeAmazonPayRequest';

    /** @var string|null */
    private $sellerId = null;

    /** @var string|null */
    private $billingAgreementId = null;

    /** @var PaymentAction|null */
    private $paymentAction = null;

    /** @var AuthorizeAttributes|null */
    private $authorizeAttributes = null;

    /** @var SellerOrderAttributes|null */
    private $sellerOrderAttributes = null;

    /** @var ProviderAttributes|null */
    private $providerAttributes = null;

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
    public function billingAgreementId()
    {
        return $this->billingAgreementId;
    }

    /**
     * @return PaymentAction|null
     */
    public function paymentAction()
    {
        return $this->paymentAction;
    }

    /**
     * @return AuthorizeAttributes|null
     */
    public function authorizeAttributes()
    {
        return $this->authorizeAttributes;
    }

    /**
     * @return SellerOrderAttributes|null
     */
    public function sellerOrderAttributes()
    {
        return $this->sellerOrderAttributes;
    }

    /**
     * @return ProviderAttributes|null
     */
    public function providerAttributes()
    {
        return $this->providerAttributes;
    }

    public static function builder(): ChargeAmazonPayRequestBuilder
    {
        $instance = new self();
        $constructor = function ($sellerId, $billingAgreementId, $paymentAction, $authorizeAttributes, $sellerOrderAttributes, $providerAttributes) use ($instance): ChargeAmazonPayRequest {
            $instance->sellerId = $sellerId;
            $instance->billingAgreementId = $billingAgreementId;
            $instance->paymentAction = $paymentAction;
            $instance->authorizeAttributes = $authorizeAttributes;
            $instance->sellerOrderAttributes = $sellerOrderAttributes;
            $instance->providerAttributes = $providerAttributes;
            return $instance;
        };
        return new class($constructor) extends ChargeAmazonPayRequestBuilder
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
        $instance = new self();
        $instance->type = self::TYPE;
        $instance->sellerId = isset($data['sellerId']) ? ((string) $data['sellerId']) : null;
        $instance->billingAgreementId = isset($data['billingAgreementId']) ? ((string) $data['billingAgreementId']) : null;
        $instance->paymentAction = isset($data['paymentAction']) ? PaymentAction::fromValue($data['paymentAction']) : null;
        $instance->authorizeAttributes = isset($data['authorizeAttributes']) ? AuthorizeAttributes::fromValue($data['authorizeAttributes']) : null;
        $instance->sellerOrderAttributes = isset($data['sellerOrderAttributes']) ? SellerOrderAttributes::fromValue($data['sellerOrderAttributes']) : null;
        $instance->providerAttributes = isset($data['providerAttributes']) ? ProviderAttributes::fromValue($data['providerAttributes']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'sellerId' => $this->sellerId,
            'billingAgreementId' => $this->billingAgreementId,
            'paymentAction' => $this->paymentAction,
            'authorizeAttributes' => $this->authorizeAttributes,
            'sellerOrderAttributes' => $this->sellerOrderAttributes,
            'providerAttributes' => $this->providerAttributes
        ]);
    }
}
