<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\Request;

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
     * @param mixed $sellerBillingAgreementId
     * @return self
     */
    public function withSellerBillingAgreementId(string $sellerBillingAgreementId): self
    {
        $this->sellerBillingAgreementId = $sellerBillingAgreementId;
        return $this;
    }

    /**
     * @param mixed $storeName
     * @return self
     */
    public function withStoreName(string $storeName): self
    {
        $this->storeName = $storeName;
        return $this;
    }

    /**
     * @param mixed $customInformation
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
