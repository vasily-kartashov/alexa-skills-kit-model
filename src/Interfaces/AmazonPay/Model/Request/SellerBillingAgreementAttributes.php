<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\Request;

use \JsonSerializable;

final class SellerBillingAgreementAttributes extends BaseAmazonPayEntity implements JsonSerializable
{
    const TYPE = 'SellerBillingAgreementAttributes';

    /** @var string|null */
    private $sellerBillingAgreementId = null;

    /** @var string|null */
    private $storeName = null;

    /** @var string|null */
    private $customInformation = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function sellerBillingAgreementId()
    {
        return $this->sellerBillingAgreementId;
    }

    /**
     * @return string|null
     */
    public function storeName()
    {
        return $this->storeName;
    }

    /**
     * @return string|null
     */
    public function customInformation()
    {
        return $this->customInformation;
    }

    public static function builder(): SellerBillingAgreementAttributesBuilder
    {
        $instance = new self;
        $constructor = function ($sellerBillingAgreementId, $storeName, $customInformation) use ($instance): SellerBillingAgreementAttributes {
            $instance->sellerBillingAgreementId = $sellerBillingAgreementId;
            $instance->storeName = $storeName;
            $instance->customInformation = $customInformation;
            return $instance;
        };
        return new class($constructor) extends SellerBillingAgreementAttributesBuilder
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
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->sellerBillingAgreementId = isset($data['sellerBillingAgreementId']) ? ((string) $data['sellerBillingAgreementId']) : null;
        $instance->storeName = isset($data['storeName']) ? ((string) $data['storeName']) : null;
        $instance->customInformation = isset($data['customInformation']) ? ((string) $data['customInformation']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'sellerBillingAgreementId' => $this->sellerBillingAgreementId,
            'storeName' => $this->storeName,
            'customInformation' => $this->customInformation
        ]);
    }
}
