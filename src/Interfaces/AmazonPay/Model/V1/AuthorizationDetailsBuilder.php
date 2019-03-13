<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

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

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $amazonAuthorizationId
     * @return self
     */
    public function withAmazonAuthorizationId(string $amazonAuthorizationId): self
    {
        $this->amazonAuthorizationId = $amazonAuthorizationId;
        return $this;
    }

    /**
     * @param string $authorizationReferenceId
     * @return self
     */
    public function withAuthorizationReferenceId(string $authorizationReferenceId): self
    {
        $this->authorizationReferenceId = $authorizationReferenceId;
        return $this;
    }

    /**
     * @param string $sellerAuthorizationNote
     * @return self
     */
    public function withSellerAuthorizationNote(string $sellerAuthorizationNote): self
    {
        $this->sellerAuthorizationNote = $sellerAuthorizationNote;
        return $this;
    }

    /**
     * @param Price $authorizationAmount
     * @return self
     */
    public function withAuthorizationAmount(Price $authorizationAmount): self
    {
        $this->authorizationAmount = $authorizationAmount;
        return $this;
    }

    /**
     * @param Price $capturedAmount
     * @return self
     */
    public function withCapturedAmount(Price $capturedAmount): self
    {
        $this->capturedAmount = $capturedAmount;
        return $this;
    }

    /**
     * @param Price $authorizationFee
     * @return self
     */
    public function withAuthorizationFee(Price $authorizationFee): self
    {
        $this->authorizationFee = $authorizationFee;
        return $this;
    }

    /**
     * @param array $idList
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
     * @param DateTime $creationTimestamp
     * @return self
     */
    public function withCreationTimestamp(DateTime $creationTimestamp): self
    {
        $this->creationTimestamp = $creationTimestamp;
        return $this;
    }

    /**
     * @param DateTime $expirationTimestamp
     * @return self
     */
    public function withExpirationTimestamp(DateTime $expirationTimestamp): self
    {
        $this->expirationTimestamp = $expirationTimestamp;
        return $this;
    }

    /**
     * @param AuthorizationStatus $authorizationStatus
     * @return self
     */
    public function withAuthorizationStatus(AuthorizationStatus $authorizationStatus): self
    {
        $this->authorizationStatus = $authorizationStatus;
        return $this;
    }

    /**
     * @param bool $softDecline
     * @return self
     */
    public function withSoftDecline(bool $softDecline): self
    {
        $this->softDecline = $softDecline;
        return $this;
    }

    /**
     * @param bool $captureNow
     * @return self
     */
    public function withCaptureNow(bool $captureNow): self
    {
        $this->captureNow = $captureNow;
        return $this;
    }

    /**
     * @param string $softDescriptor
     * @return self
     */
    public function withSoftDescriptor(string $softDescriptor): self
    {
        $this->softDescriptor = $softDescriptor;
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
            $this->softDescriptor
        );
    }
}
