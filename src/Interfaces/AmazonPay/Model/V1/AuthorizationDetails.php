<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

use JsonSerializable;
use \DateTime;

final class AuthorizationDetails implements JsonSerializable
{
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

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function amazonAuthorizationId()
    {
        return $this->amazonAuthorizationId;
    }

    /**
     * @return string|null
     */
    public function authorizationReferenceId()
    {
        return $this->authorizationReferenceId;
    }

    /**
     * @return string|null
     */
    public function sellerAuthorizationNote()
    {
        return $this->sellerAuthorizationNote;
    }

    /**
     * @return Price|null
     */
    public function authorizationAmount()
    {
        return $this->authorizationAmount;
    }

    /**
     * @return Price|null
     */
    public function capturedAmount()
    {
        return $this->capturedAmount;
    }

    /**
     * @return Price|null
     */
    public function authorizationFee()
    {
        return $this->authorizationFee;
    }

    /**
     * @return string[]
     */
    public function idList()
    {
        return $this->idList;
    }

    /**
     * @return DateTime|null
     */
    public function creationTimestamp()
    {
        return $this->creationTimestamp;
    }

    /**
     * @return DateTime|null
     */
    public function expirationTimestamp()
    {
        return $this->expirationTimestamp;
    }

    /**
     * @return AuthorizationStatus|null
     */
    public function authorizationStatus()
    {
        return $this->authorizationStatus;
    }

    /**
     * @return bool|null
     */
    public function softDecline()
    {
        return $this->softDecline;
    }

    /**
     * @return bool|null
     */
    public function captureNow()
    {
        return $this->captureNow;
    }

    /**
     * @return string|null
     */
    public function softDescriptor()
    {
        return $this->softDescriptor;
    }

    public static function builder(): AuthorizationDetailsBuilder
    {
        $instance = new self;
        return new class($constructor = function ($amazonAuthorizationId, $authorizationReferenceId, $sellerAuthorizationNote, $authorizationAmount, $capturedAmount, $authorizationFee, $idList, $creationTimestamp, $expirationTimestamp, $authorizationStatus, $softDecline, $captureNow, $softDescriptor) use ($instance): AuthorizationDetails {
            $instance->amazonAuthorizationId = $amazonAuthorizationId;
            $instance->authorizationReferenceId = $authorizationReferenceId;
            $instance->sellerAuthorizationNote = $sellerAuthorizationNote;
            $instance->authorizationAmount = $authorizationAmount;
            $instance->capturedAmount = $capturedAmount;
            $instance->authorizationFee = $authorizationFee;
            $instance->idList = $idList;
            $instance->creationTimestamp = $creationTimestamp;
            $instance->expirationTimestamp = $expirationTimestamp;
            $instance->authorizationStatus = $authorizationStatus;
            $instance->softDecline = $softDecline;
            $instance->captureNow = $captureNow;
            $instance->softDescriptor = $softDescriptor;
            return $instance;
        }) extends AuthorizationDetailsBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->amazonAuthorizationId = isset($data['amazonAuthorizationId']) ? ((string) $data['amazonAuthorizationId']) : null;
        $instance->authorizationReferenceId = isset($data['authorizationReferenceId']) ? ((string) $data['authorizationReferenceId']) : null;
        $instance->sellerAuthorizationNote = isset($data['sellerAuthorizationNote']) ? ((string) $data['sellerAuthorizationNote']) : null;
        $instance->authorizationAmount = isset($data['authorizationAmount']) ? Price::fromValue($data['authorizationAmount']) : null;
        $instance->capturedAmount = isset($data['capturedAmount']) ? Price::fromValue($data['capturedAmount']) : null;
        $instance->authorizationFee = isset($data['authorizationFee']) ? Price::fromValue($data['authorizationFee']) : null;
        $instance->idList = [];
        if (isset($data['idList'])) {
            foreach ($data['idList'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->idList[] = $element;
                }
            }
        }
        $instance->creationTimestamp = isset($data['creationTimestamp']) ? new DateTime($data['creationTimestamp']) : null;
        $instance->expirationTimestamp = isset($data['expirationTimestamp']) ? new DateTime($data['expirationTimestamp']) : null;
        $instance->authorizationStatus = isset($data['authorizationStatus']) ? AuthorizationStatus::fromValue($data['authorizationStatus']) : null;
        $instance->softDecline = isset($data['softDecline']) ? ((bool) $data['softDecline']) : null;
        $instance->captureNow = isset($data['captureNow']) ? ((bool) $data['captureNow']) : null;
        $instance->softDescriptor = isset($data['softDescriptor']) ? ((string) $data['softDescriptor']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'amazonAuthorizationId' => $this->amazonAuthorizationId,
            'authorizationReferenceId' => $this->authorizationReferenceId,
            'sellerAuthorizationNote' => $this->sellerAuthorizationNote,
            'authorizationAmount' => $this->authorizationAmount,
            'capturedAmount' => $this->capturedAmount,
            'authorizationFee' => $this->authorizationFee,
            'idList' => $this->idList,
            'creationTimestamp' => $this->creationTimestamp,
            'expirationTimestamp' => $this->expirationTimestamp,
            'authorizationStatus' => $this->authorizationStatus,
            'softDecline' => $this->softDecline,
            'captureNow' => $this->captureNow,
            'softDescriptor' => $this->softDescriptor
        ]);
    }
}
