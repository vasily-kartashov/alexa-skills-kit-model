<?php

namespace Alexa\Model\Interfaces\AmazonPay\Response;

use Alexa\Model\Interfaces\AmazonPay\Model\Response\AuthorizationDetails;

abstract class ChargeAmazonPayResultBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $amazonOrderReferenceId = null;

    /** @var AuthorizationDetails|null */
    private $authorizationDetails = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withAmazonOrderReferenceId(string $amazonOrderReferenceId): self
    {
        $this->amazonOrderReferenceId = $amazonOrderReferenceId;
        return $this;
    }

    public function withAuthorizationDetails(AuthorizationDetails $authorizationDetails): self
    {
        $this->authorizationDetails = $authorizationDetails;
        return $this;
    }

    public function build(): ChargeAmazonPayResult
    {
        return ($this->constructor)(
            $this->amazonOrderReferenceId,
            $this->authorizationDetails
        );
    }
}
