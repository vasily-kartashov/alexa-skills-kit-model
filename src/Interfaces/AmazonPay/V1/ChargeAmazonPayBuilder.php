<?php

namespace Alexa\Model\Interfaces\AmazonPay\V1;

use Alexa\Model\Interfaces\AmazonPay\Model\V1\AuthorizeAttributes;
use Alexa\Model\Interfaces\AmazonPay\Model\V1\PaymentAction;
use Alexa\Model\Interfaces\AmazonPay\Model\V1\ProviderAttributes;
use Alexa\Model\Interfaces\AmazonPay\Model\V1\SellerOrderAttributes;

abstract class ChargeAmazonPayBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $consentToken = null;

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

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $consentToken
     * @return self
     */
    public function withConsentToken(string $consentToken): self
    {
        $this->consentToken = $consentToken;
        return $this;
    }

    /**
     * @param string $sellerId
     * @return self
     */
    public function withSellerId(string $sellerId): self
    {
        $this->sellerId = $sellerId;
        return $this;
    }

    /**
     * @param string $billingAgreementId
     * @return self
     */
    public function withBillingAgreementId(string $billingAgreementId): self
    {
        $this->billingAgreementId = $billingAgreementId;
        return $this;
    }

    /**
     * @param PaymentAction $paymentAction
     * @return self
     */
    public function withPaymentAction(PaymentAction $paymentAction): self
    {
        $this->paymentAction = $paymentAction;
        return $this;
    }

    /**
     * @param AuthorizeAttributes $authorizeAttributes
     * @return self
     */
    public function withAuthorizeAttributes(AuthorizeAttributes $authorizeAttributes): self
    {
        $this->authorizeAttributes = $authorizeAttributes;
        return $this;
    }

    /**
     * @param SellerOrderAttributes $sellerOrderAttributes
     * @return self
     */
    public function withSellerOrderAttributes(SellerOrderAttributes $sellerOrderAttributes): self
    {
        $this->sellerOrderAttributes = $sellerOrderAttributes;
        return $this;
    }

    /**
     * @param ProviderAttributes $providerAttributes
     * @return self
     */
    public function withProviderAttributes(ProviderAttributes $providerAttributes): self
    {
        $this->providerAttributes = $providerAttributes;
        return $this;
    }

    public function build(): ChargeAmazonPay
    {
        return ($this->constructor)(
            $this->consentToken,
            $this->sellerId,
            $this->billingAgreementId,
            $this->paymentAction,
            $this->authorizeAttributes,
            $this->sellerOrderAttributes,
            $this->providerAttributes
        );
    }
}
