<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\Request;

use JsonSerializable;

final class ProviderCredit extends BaseAmazonPayEntity implements JsonSerializable
{
    const TYPE = 'ProviderCredit';

    /** @var string|null */
    private $providerId = null;

    /** @var Price|null */
    private $credit = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function providerId()
    {
        return $this->providerId;
    }

    /**
     * @return Price|null
     */
    public function credit()
    {
        return $this->credit;
    }

    public static function builder(): ProviderCreditBuilder
    {
        $instance = new self;
        return new class($constructor = function ($providerId, $credit) use ($instance): ProviderCredit {
            $instance->providerId = $providerId;
            $instance->credit = $credit;
            return $instance;
        }) extends ProviderCreditBuilder {};
    }

    /**
     * @param string $providerId
     * @return self
     */
    public static function ofProviderId(string $providerId): ProviderCredit
    {
        $instance = new self;
        $instance->providerId = $providerId;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->providerId = isset($data['providerId']) ? ((string) $data['providerId']) : null;
        $instance->credit = isset($data['credit']) ? Price::fromValue($data['credit']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'providerId' => $this->providerId,
            'credit' => $this->credit
        ]);
    }
}
