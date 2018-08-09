<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

abstract class SellerBillingAgreementAttributesBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $sellerBillingAgreementId = null;

    /** @var string|null */
    private $storeName = null;

    /** @var string|null */
    private $customInformation = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withSellerBillingAgreementId(string $sellerBillingAgreementId): self
    {
        $this->sellerBillingAgreementId = $sellerBillingAgreementId;
        return $this;
    }

    public function withStoreName(string $storeName): self
    {
        $this->storeName = $storeName;
        return $this;
    }

    public function withCustomInformation(string $customInformation): self
    {
        $this->customInformation = $customInformation;
        return $this;
    }

    public function build(): SellerBillingAgreementAttributes
    {
        return ($this->constructor)(
            $this->sellerBillingAgreementId,
            $this->storeName,
            $this->customInformation
        );
    }
}
