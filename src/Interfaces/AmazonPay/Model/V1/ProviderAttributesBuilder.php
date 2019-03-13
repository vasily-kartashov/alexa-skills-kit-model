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

    /**
     * @param mixed $providerId
     * @return self
     */
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
        foreach ($providerCreditList as $element) {
            assert($element instanceof ProviderCredit);
        }
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
