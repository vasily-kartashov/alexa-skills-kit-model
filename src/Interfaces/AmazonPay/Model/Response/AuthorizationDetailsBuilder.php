<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\Response;

use \DateTime;

abstract class AuthorizationDetailsBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $amazonAuthorizationId = null;

    /** @var string|null */
    private $authorizationReferenceId = null;

    /** @var string|null */
    private $sellerAuthorizationNote = null;

    /** @var Price|null */
    private $authorizationAmount = null;

    /** @var Price|null */
    private $capturedAmount = null;

    /** @var Price|null */
    private $authorizationFee = null;

    /** @var string[] */
    private $idList = [];

    /** @var DateTime|null */
    private $creationTimestamp = null;

    /** @var DateTime|null */
    private $expirationTimestamp = null;

    /** @var AuthorizationStatus|null */
    private $authorizationStatus = null;

    /** @var bool|null */
    private $softDecline = null;

    /** @var bool|null */
    private $captureNow = null;

    /** @var string|null */
    private $softDescriptor = null;

    /** @var Destination|null */
    private $authorizationBillingAddress = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $amazonAuthorizationId
     * @return self
     */
    public function withAmazonAuthorizationId(string $amazonAuthorizationId): self
    {
        $this->amazonAuthorizationId = $amazonAuthorizationId;
        return $this;
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
     * @param mixed $sellerAuthorizationNote
     * @return self
     */
    public function withSellerAuthorizationNote(string $sellerAuthorizationNote): self
    {
        $this->sellerAuthorizationNote = $sellerAuthorizationNote;
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
     * @param mixed $capturedAmount
     * @return self
     */
    public function withCapturedAmount(Price $capturedAmount): self
    {
        $this->capturedAmount = $capturedAmount;
        return $this;
    }

    /**
     * @param mixed $authorizationFee
     * @return self
     */
    public function withAuthorizationFee(Price $authorizationFee): self
    {
        $this->authorizationFee = $authorizationFee;
        return $this;
    }

    /**
     * @param string[] $idList
     * @return self
     */
    public function withIdList(array $idList): self
    {
        foreach ($idList as $element) {
            assert(is_string($element));
        }
        $this->idList = $idList;
        return $this;
    }

    /**
     * @param mixed $creationTimestamp
     * @return self
     */
    public function withCreationTimestamp(DateTime $creationTimestamp): self
    {
        $this->creationTimestamp = $creationTimestamp;
        return $this;
    }

    /**
     * @param mixed $expirationTimestamp
     * @return self
     */
    public function withExpirationTimestamp(DateTime $expirationTimestamp): self
    {
        $this->expirationTimestamp = $expirationTimestamp;
        return $this;
    }

    /**
     * @param mixed $authorizationStatus
     * @return self
     */
    public function withAuthorizationStatus(AuthorizationStatus $authorizationStatus): self
    {
        $this->authorizationStatus = $authorizationStatus;
        return $this;
    }

    /**
     * @param mixed $softDecline
     * @return self
     */
    public function withSoftDecline(bool $softDecline): self
    {
        $this->softDecline = $softDecline;
        return $this;
    }

    /**
     * @param mixed $captureNow
     * @return self
     */
    public function withCaptureNow(bool $captureNow): self
    {
        $this->captureNow = $captureNow;
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

    /**
     * @param mixed $authorizationBillingAddress
     * @return self
     */
    public function withAuthorizationBillingAddress(Destination $authorizationBillingAddress): self
    {
        $this->authorizationBillingAddress = $authorizationBillingAddress;
        return $this;
    }

    public function build(): AuthorizationDetails
    {
        return ($this->constructor)(
            $this->amazonAuthorizationId,
            $this->authorizationReferenceId,
            $this->sellerAuthorizationNote,
            $this->authorizationAmount,
            $this->capturedAmount,
            $this->authorizationFee,
            $this->idList,
            $this->creationTimestamp,
            $this->expirationTimestamp,
            $this->authorizationStatus,
            $this->softDecline,
            $this->captureNow,
            $this->softDescriptor,
            $this->authorizationBillingAddress
        );
    }
}
