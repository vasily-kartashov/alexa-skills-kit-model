<?php

namespace Alexa\Model\Interfaces\AmazonPay\Response;

use Alexa\Model\Interfaces\AmazonPay\Model\Response\BillingAgreementDetails;

abstract class SetupAmazonPayResultBuilder
{
    /** @var callable */
    private $constructor;

    /** @var BillingAgreementDetails|null */
    private $billingAgreementDetails = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param BillingAgreementDetails $billingAgreementDetails
     * @return self
     */
    public function withBillingAgreementDetails(BillingAgreementDetails $billingAgreementDetails): self
    {
        $this->billingAgreementDetails = $billingAgreementDetails;
        return $this;
    }

    public function build(): SetupAmazonPayResult
    {
        return ($this->constructor)(
            $this->billingAgreementDetails
        );
    }
}
