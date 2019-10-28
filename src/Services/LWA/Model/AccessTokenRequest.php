<?php

namespace Alexa\Model\Services\LWA\Model;

use \JsonSerializable;

final class AccessTokenRequest implements JsonSerializable
{
    /** @var string|null */
    private $client_id = null;

    /** @var string|null */
    private $client_secret = null;

    /** @var string|null */
    private $scope = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function client_id()
    {
        return $this->client_id;
    }

    /**
     * @return string|null
     */
    public function client_secret()
    {
        return $this->client_secret;
    }

    /**
     * @return string|null
     */
    public function scope()
    {
        return $this->scope;
    }

    public static function builder(): AccessTokenRequestBuilder
    {
        $instance = new self;
        $constructor = function ($client_id, $client_secret, $scope) use ($instance): AccessTokenRequest {
            $instance->client_id = $client_id;
            $instance->client_secret = $client_secret;
            $instance->scope = $scope;
            return $instance;
        };
        return new class($constructor) extends AccessTokenRequestBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param string $client_id
     * @return self
     */
    public static function ofClient_id(string $client_id): AccessTokenRequest
    {
        $instance = new self;
        $instance->client_id = $client_id;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->client_id = isset($data['client_id']) ? ((string) $data['client_id']) : null;
        $instance->client_secret = isset($data['client_secret']) ? ((string) $data['client_secret']) : null;
        $instance->scope = isset($data['scope']) ? ((string) $data['scope']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'scope' => $this->scope
        ]);
    }
}
