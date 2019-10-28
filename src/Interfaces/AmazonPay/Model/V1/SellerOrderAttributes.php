<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

use \JsonSerializable;

final class SellerOrderAttributes implements JsonSerializable
{
    /** @var string|null */
    private $sellerOrderId = null;

    /** @var string|null */
    private $storeName = null;

    /** @var string|null */
    private $customInformation = null;

    /** @var string|null */
    private $sellerNote = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function sellerOrderId()
    {
        return $this->sellerOrderId;
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

    /**
     * @return string|null
     */
    public function sellerNote()
    {
        return $this->sellerNote;
    }

    public static function builder(): SellerOrderAttributesBuilder
    {
        $instance = new self;
        $constructor = function ($sellerOrderId, $storeName, $customInformation, $sellerNote) use ($instance): SellerOrderAttributes {
            $instance->sellerOrderId = $sellerOrderId;
            $instance->storeName = $storeName;
            $instance->customInformation = $customInformation;
            $instance->sellerNote = $sellerNote;
            return $instance;
        };
        return new class($constructor) extends SellerOrderAttributesBuilder
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
        $instance->sellerOrderId = isset($data['sellerOrderId']) ? ((string) $data['sellerOrderId']) : null;
        $instance->storeName = isset($data['storeName']) ? ((string) $data['storeName']) : null;
        $instance->customInformation = isset($data['customInformation']) ? ((string) $data['customInformation']) : null;
        $instance->sellerNote = isset($data['sellerNote']) ? ((string) $data['sellerNote']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'sellerOrderId' => $this->sellerOrderId,
            'storeName' => $this->storeName,
            'customInformation' => $this->customInformation,
            'sellerNote' => $this->sellerNote
        ]);
    }
}
