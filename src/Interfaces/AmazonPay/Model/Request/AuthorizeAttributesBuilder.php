<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\Request;

abstract class AuthorizeAttributesBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $authorizationReferenceId = null;

    /** @var Price|null */
    private $authorizationAmount = null;

    /** @var int|null */
    private $transactionTimeout = null;

    /** @var string|null */
    private $sellerAuthorizationNote = null;

    /** @var string|null */
    private $softDescriptor = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $authorizationReferenceId
     * @return self
     */
    public function withAuthorizationReferenceId(string $authorizationReferenceId): self
    {
        $this->authorizationReferenceId = $authorizationReferenceId;
        return $this;
    }

    /**
     * @param mixed $authorizationAmount
     * @return self
     */
    public function withAuthorizationAmount(Price $authorizationAmount): self
    {
        $this->authorizationAmount = $authorizationAmount;
        return $this;
    }

    /**
     * @param mixed $transactionTimeout
     * @return self
     */
    public function withTransactionTimeout(int $transactionTimeout): self
    {
        $this->transactionTimeout = $transactionTimeout;
        return $this;
    }

    /**
     * @param mixed $sellerAuthorizationNote
     * @return self
     */
    public function withSellerAuthorizationNote(string $sellerAuthorizationNote): self
    {
        $this->sellerAuthorizationNote = $sellerAuthorizationNote;
        return $this;
    }

    /**
     * @param mixed $softDescriptor
     * @return self
     */
    public function withSoftDescriptor(string $softDescriptor): self
    {
        $this->softDescriptor = $softDescriptor;
        return $this;
    }

    public function build(): AuthorizeAttributes
    {
        return ($this->constructor)(
            $this->authorizationReferenceId,
            $this->authorizationAmount,
            $this->transactionTimeout,
            $this->sellerAuthorizationNote,
            $this->softDescriptor
        );
    }
}
