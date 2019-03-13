<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

use \JsonSerializable;

final class ProviderAttributes implements JsonSerializable
{
    /** @var string|null */
    private $providerId = null;

    /** @var ProviderCredit[] */
    private $providerCreditList = [];

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function providerId()
    {
        return $this->providerId;
    }

    /**
     * @return ProviderCredit[]
     */
    public function providerCreditList()
    {
        return $this->providerCreditList;
    }

    public static function builder(): ProviderAttributesBuilder
    {
        $instance = new self();
        $constructor = function ($providerId, $providerCreditList) use ($instance): ProviderAttributes {
            $instance->providerId = $providerId;
            $instance->providerCreditList = $providerCreditList;
            return $instance;
        };
        return new class($constructor) extends ProviderAttributesBuilder
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
        $instance->providerId = isset($data['providerId']) ? ((string) $data['providerId']) : null;
        $instance->providerCreditList = [];
        if (isset($data['providerCreditList'])) {
            foreach ($data['providerCreditList'] as $item) {
                $element = isset($item) ? ProviderCredit::fromValue($item) : null;
                if ($element !== null) {
                    $instance->providerCreditList[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'providerId' => $this->providerId,
            'providerCreditList' => $this->providerCreditList
        ]);
    }
}
