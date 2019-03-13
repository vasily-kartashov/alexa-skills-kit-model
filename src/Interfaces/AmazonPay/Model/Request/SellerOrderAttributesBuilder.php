<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\Request;

abstract class SellerOrderAttributesBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $sellerOrderId = null;

    /** @var string|null */
    private $storeName = null;

    /** @var string|null */
    private $customInformation = null;

    /** @var string|null */
    private $sellerNote = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $sellerOrderId
     * @return self
     */
    public function withSellerOrderId(string $sellerOrderId): self
    {
        $this->sellerOrderId = $sellerOrderId;
        return $this;
    }

    /**
     * @param string $storeName
     * @return self
     */
    public function withStoreName(string $storeName): self
    {
        $this->storeName = $storeName;
        return $this;
    }

    /**
     * @param string $customInformation
     * @return self
     */
    public function withCustomInformation(string $customInformation): self
    {
        $this->customInformation = $customInformation;
        return $this;
    }

    /**
     * @param string $sellerNote
     * @return self
     */
    public function withSellerNote(string $sellerNote): self
    {
        $this->sellerNote = $sellerNote;
        return $this;
    }

    public function build(): SellerOrderAttributes
    {
        return ($this->constructor)(
            $this->sellerOrderId,
            $this->storeName,
            $this->customInformation,
            $this->sellerNote
        );
    }
}
