<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

abstract class BillingAgreementAttributesBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $platformId = null;

    /** @var string|null */
    private $sellerNote = null;

    /** @var SellerBillingAgreementAttributes|null */
    private $sellerBillingAgreementAttributes = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $platformId
     * @return self
     */
    public function withPlatformId(string $platformId): self
    {
        $this->platformId = $platformId;
        return $this;
    }

    /**
     * @param mixed $sellerNote
     * @return self
     */
    public function withSellerNote(string $sellerNote): self
    {
        $this->sellerNote = $sellerNote;
        return $this;
    }

    /**
     * @param mixed $sellerBillingAgreementAttributes
     * @return self
     */
    public function withSellerBillingAgreementAttributes(SellerBillingAgreementAttributes $sellerBillingAgreementAttributes): self
    {
        $this->sellerBillingAgreementAttributes = $sellerBillingAgreementAttributes;
        return $this;
    }

    public function build(): BillingAgreementAttributes
    {
        return ($this->constructor)(
            $this->platformId,
            $this->sellerNote,
            $this->sellerBillingAgreementAttributes
        );
    }
}
