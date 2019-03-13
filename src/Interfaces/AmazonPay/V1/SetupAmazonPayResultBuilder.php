<?php

namespace Alexa\Model\Interfaces\AmazonPay\V1;

use Alexa\Model\Interfaces\AmazonPay\Model\V1\BillingAgreementDetails;

abstract class SetupAmazonPayResultBuilder
{
    /** @var callable */
    private $constructor;

    /** @var BillingAgreementDetails|null */
    private $billingAgreementDetails = null;

    protected function __construct(callable $constructor)
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
