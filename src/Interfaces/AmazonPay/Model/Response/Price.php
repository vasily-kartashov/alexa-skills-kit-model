<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\Response;

use \JsonSerializable;

final class Price implements JsonSerializable
{
    /** @var string|null */
    private $amount = null;

    /** @var string|null */
    private $currencyCode = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function amount()
    {
        return $this->amount;
    }

    /**
     * @return string|null
     */
    public function currencyCode()
    {
        return $this->currencyCode;
    }

    public static function builder(): PriceBuilder
    {
        $instance = new self();
        $constructor = function ($amount, $currencyCode) use ($instance): Price {
            $instance->amount = $amount;
            $instance->currencyCode = $currencyCode;
            return $instance;
        };
        return new class($constructor) extends PriceBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->amount = isset($data['amount']) ? ((string) $data['amount']) : null;
        $instance->currencyCode = isset($data['currencyCode']) ? ((string) $data['currencyCode']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'amount' => $this->amount,
            'currencyCode' => $this->currencyCode
        ]);
    }
}
