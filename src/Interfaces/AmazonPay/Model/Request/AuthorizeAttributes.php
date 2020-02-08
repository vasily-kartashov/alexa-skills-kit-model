<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\Request;

use JsonSerializable;

final class AuthorizeAttributes extends BaseAmazonPayEntity implements JsonSerializable
{
    const TYPE = 'AuthorizeAttributes';

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

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function authorizationReferenceId()
    {
        return $this->authorizationReferenceId;
    }

    /**
     * @return Price|null
     */
    public function authorizationAmount()
    {
        return $this->authorizationAmount;
    }

    /**
     * @return int|null
     */
    public function transactionTimeout()
    {
        return $this->transactionTimeout;
    }

    /**
     * @return string|null
     */
    public function sellerAuthorizationNote()
    {
        return $this->sellerAuthorizationNote;
    }

    /**
     * @return string|null
     */
    public function softDescriptor()
    {
        return $this->softDescriptor;
    }

    public static function builder(): AuthorizeAttributesBuilder
    {
        $instance = new self;
        return new class($constructor = function ($authorizationReferenceId, $authorizationAmount, $transactionTimeout, $sellerAuthorizationNote, $softDescriptor) use ($instance): AuthorizeAttributes {
            $instance->authorizationReferenceId = $authorizationReferenceId;
            $instance->authorizationAmount = $authorizationAmount;
            $instance->transactionTimeout = $transactionTimeout;
            $instance->sellerAuthorizationNote = $sellerAuthorizationNote;
            $instance->softDescriptor = $softDescriptor;
            return $instance;
        }) extends AuthorizeAttributesBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->authorizationReferenceId = isset($data['authorizationReferenceId']) ? ((string) $data['authorizationReferenceId']) : null;
        $instance->authorizationAmount = isset($data['authorizationAmount']) ? Price::fromValue($data['authorizationAmount']) : null;
        $instance->transactionTimeout = isset($data['transactionTimeout']) ? ((int) $data['transactionTimeout']) : null;
        $instance->sellerAuthorizationNote = isset($data['sellerAuthorizationNote']) ? ((string) $data['sellerAuthorizationNote']) : null;
        $instance->softDescriptor = isset($data['softDescriptor']) ? ((string) $data['softDescriptor']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'authorizationReferenceId' => $this->authorizationReferenceId,
            'authorizationAmount' => $this->authorizationAmount,
            'transactionTimeout' => $this->transactionTimeout,
            'sellerAuthorizationNote' => $this->sellerAuthorizationNote,
            'softDescriptor' => $this->softDescriptor
        ]);
    }
}
