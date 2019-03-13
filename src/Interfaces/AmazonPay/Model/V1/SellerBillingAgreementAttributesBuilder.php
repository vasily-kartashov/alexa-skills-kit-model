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

    /**
     * @param string $sellerBillingAgreementId
     * @return self
     */
    public function withSellerBillingAgreementId(string $sellerBillingAgreementId): self
    {
        $this->sellerBillingAgreementId = $sellerBillingAgreementId;
        return $this;
    }

    /**
     * @param string $storeName
     * @return self
     */
    public function withStoreName(string $storeName): self
    {
        $this->storeName = $storeName;
        return $this;
    }

    /**
     * @param string $customInformation
     * @return self
     */
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
