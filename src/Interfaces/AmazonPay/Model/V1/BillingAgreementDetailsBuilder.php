<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

use \DateTime;

abstract class BillingAgreementDetailsBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $billingAgreementId = null;

    /** @var DateTime|null */
    private $creationTimestamp = null;

    /** @var Destination|null */
    private $destination = null;

    /** @var string|null */
    private $checkoutLanguage = null;

    /** @var ReleaseEnvironment|null */
    private $releaseEnvironment = null;

    /** @var BillingAgreementStatus|null */
    private $billingAgreementStatus = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withBillingAgreementId(string $billingAgreementId): self
    {
        $this->billingAgreementId = $billingAgreementId;
        return $this;
    }

    public function withCreationTimestamp(DateTime $creationTimestamp): self
    {
        $this->creationTimestamp = $creationTimestamp;
        return $this;
    }

    public function withDestination(Destination $destination): self
    {
        $this->destination = $destination;
        return $this;
    }

    public function withCheckoutLanguage(string $checkoutLanguage): self
    {
        $this->checkoutLanguage = $checkoutLanguage;
        return $this;
    }

    public function withReleaseEnvironment(ReleaseEnvironment $releaseEnvironment): self
    {
        $this->releaseEnvironment = $releaseEnvironment;
        return $this;
    }

    public function withBillingAgreementStatus(BillingAgreementStatus $billingAgreementStatus): self
    {
        $this->billingAgreementStatus = $billingAgreementStatus;
        return $this;
    }

    public function build(): BillingAgreementDetails
    {
        return ($this->constructor)(
            $this->billingAgreementId,
            $this->creationTimestamp,
            $this->destination,
            $this->checkoutLanguage,
            $this->releaseEnvironment,
            $this->billingAgreementStatus
        );
    }
}
