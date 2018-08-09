<?php

namespace Alexa\Model\Interfaces\AmazonPay\V1;

use Alexa\Model\Interfaces\AmazonPay\Model\V1\AuthorizationDetails;
use \JsonSerializable;

final class ChargeAmazonPayResult implements JsonSerializable
{
    /** @var string|null */
    private $amazonOrderReferenceId = null;

    /** @var AuthorizationDetails|null */
    private $authorizationDetails = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function amazonOrderReferenceId()
    {
        return $this->amazonOrderReferenceId;
    }

    /**
     * @return AuthorizationDetails|null
     */
    public function authorizationDetails()
    {
        return $this->authorizationDetails;
    }

    public static function builder(): ChargeAmazonPayResultBuilder
    {
        $instance = new self();
        $constructor = function ($amazonOrderReferenceId, $authorizationDetails) use ($instance): ChargeAmazonPayResult {
            $instance->amazonOrderReferenceId = $amazonOrderReferenceId;
            $instance->authorizationDetails = $authorizationDetails;
            return $instance;
        };
        return new class($constructor) extends ChargeAmazonPayResultBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->amazonOrderReferenceId = isset($data['amazonOrderReferenceId']) ? ((string) $data['amazonOrderReferenceId']) : null;
        $instance->authorizationDetails = isset($data['authorizationDetails']) ? AuthorizationDetails::fromValue($data['authorizationDetails']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'amazonOrderReferenceId' => $this->amazonOrderReferenceId,
            'authorizationDetails' => $this->authorizationDetails
        ]);
    }
}
