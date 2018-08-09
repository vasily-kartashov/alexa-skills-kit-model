<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

abstract class PriceBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $amount = null;

    /** @var string|null */
    private $currencyCode = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withAmount(string $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function withCurrencyCode(string $currencyCode): self
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    public function build(): Price
    {
        return ($this->constructor)(
            $this->amount,
            $this->currencyCode
        );
    }
}
