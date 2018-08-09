<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

abstract class ProviderAttributesBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $providerId = null;

    /** @var ProviderCredit[] */
    private $providerCreditList = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withProviderId(string $providerId): self
    {
        $this->providerId = $providerId;
        return $this;
    }

    /**
     * @param ProviderCredit[] $providerCreditList
     * @return self
     */
    public function withProviderCreditList(array $providerCreditList): self
    {
        $this->providerCreditList = $providerCreditList;
        return $this;
    }

    public function build(): ProviderAttributes
    {
        return ($this->constructor)(
            $this->providerId,
            $this->providerCreditList
        );
    }
}
