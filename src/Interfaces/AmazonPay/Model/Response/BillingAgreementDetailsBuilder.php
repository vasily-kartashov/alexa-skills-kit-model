<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\Response;

use Alexa\Model\Interfaces\AmazonPay\Model\V1\BillingAgreementStatus;
use Alexa\Model\Interfaces\AmazonPay\Model\V1\Destination;
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

    /** @var Destination|null */
    private $billingAddress = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $billingAgreementId
     * @return self
     */
    public function withBillingAgreementId(string $billingAgreementId): self
    {
        $this->billingAgreementId = $billingAgreementId;
        return $this;
    }

    /**
     * @param mixed $creationTimestamp
     * @return self
     */
    public function withCreationTimestamp(DateTime $creationTimestamp): self
    {
        $this->creationTimestamp = $creationTimestamp;
        return $this;
    }

    /**
     * @param mixed $destination
     * @return self
     */
    public function withDestination(Destination $destination): self
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @param mixed $checkoutLanguage
     * @return self
     */
    public function withCheckoutLanguage(string $checkoutLanguage): self
    {
        $this->checkoutLanguage = $checkoutLanguage;
        return $this;
    }

    /**
     * @param mixed $releaseEnvironment
     * @return self
     */
    public function withReleaseEnvironment(ReleaseEnvironment $releaseEnvironment): self
    {
        $this->releaseEnvironment = $releaseEnvironment;
        return $this;
    }

    /**
     * @param mixed $billingAgreementStatus
     * @return self
     */
    public function withBillingAgreementStatus(BillingAgreementStatus $billingAgreementStatus): self
    {
        $this->billingAgreementStatus = $billingAgreementStatus;
        return $this;
    }

    /**
     * @param mixed $billingAddress
     * @return self
     */
    public function withBillingAddress(Destination $billingAddress): self
    {
        $this->billingAddress = $billingAddress;
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
            $this->billingAgreementStatus,
            $this->billingAddress
        );
    }
}
