<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\Response;

use JsonSerializable;
use \DateTime;

final class AuthorizationStatus implements JsonSerializable
{
    /** @var State|null */
    private $state = null;

    /** @var string|null */
    private $reasonCode = null;

    /** @var string|null */
    private $reasonDescription = null;

    /** @var DateTime|null */
    private $lastUpdateTimestamp = null;

    protected function __construct()
    {
    }

    /**
     * @return State|null
     */
    public function state()
    {
        return $this->state;
    }

    /**
     * @return string|null
     */
    public function reasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * @return string|null
     */
    public function reasonDescription()
    {
        return $this->reasonDescription;
    }

    /**
     * @return DateTime|null
     */
    public function lastUpdateTimestamp()
    {
        return $this->lastUpdateTimestamp;
    }

    public static function builder(): AuthorizationStatusBuilder
    {
        $instance = new self;
        return new class($constructor = function ($state, $reasonCode, $reasonDescription, $lastUpdateTimestamp) use ($instance): AuthorizationStatus {
            $instance->state = $state;
            $instance->reasonCode = $reasonCode;
            $instance->reasonDescription = $reasonDescription;
            $instance->lastUpdateTimestamp = $lastUpdateTimestamp;
            return $instance;
        }) extends AuthorizationStatusBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->state = isset($data['state']) ? State::fromValue($data['state']) : null;
        $instance->reasonCode = isset($data['reasonCode']) ? ((string) $data['reasonCode']) : null;
        $instance->reasonDescription = isset($data['reasonDescription']) ? ((string) $data['reasonDescription']) : null;
        $instance->lastUpdateTimestamp = isset($data['lastUpdateTimestamp']) ? new DateTime($data['lastUpdateTimestamp']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'state' => $this->state,
            'reasonCode' => $this->reasonCode,
            'reasonDescription' => $this->reasonDescription,
            'lastUpdateTimestamp' => $this->lastUpdateTimestamp
        ]);
    }
}
