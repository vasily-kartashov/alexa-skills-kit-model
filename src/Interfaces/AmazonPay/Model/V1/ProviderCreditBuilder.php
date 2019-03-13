<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

abstract class ProviderCreditBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $providerId = null;

    /** @var Price|null */
    private $credit = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $providerId
     * @return self
     */
    public function withProviderId(string $providerId): self
    {
        $this->providerId = $providerId;
        return $this;
    }

    /**
     * @param Price $credit
     * @return self
     */
    public function withCredit(Price $credit): self
    {
        $this->credit = $credit;
        return $this;
    }

    public function build(): ProviderCredit
    {
        return ($this->constructor)(
            $this->providerId,
            $this->credit
        );
    }
}
