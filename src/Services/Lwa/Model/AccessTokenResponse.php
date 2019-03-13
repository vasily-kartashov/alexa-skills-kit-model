<?php

namespace Alexa\Model\Services\Lwa\Model;

use \JsonSerializable;

final class AccessTokenResponse implements JsonSerializable
{
    /** @var string|null */
    private $access_token = null;

    /** @var int|null */
    private $expires_in = null;

    /** @var string|null */
    private $scope = null;

    /** @var string|null */
    private $token_type = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function access_token()
    {
        return $this->access_token;
    }

    /**
     * @return int|null
     */
    public function expires_in()
    {
        return $this->expires_in;
    }

    /**
     * @return string|null
     */
    public function scope()
    {
        return $this->scope;
    }

    /**
     * @return string|null
     */
    public function token_type()
    {
        return $this->token_type;
    }

    public static function builder(): AccessTokenResponseBuilder
    {
        $instance = new self();
        $constructor = function ($access_token, $expires_in, $scope, $token_type) use ($instance): AccessTokenResponse {
            $instance->access_token = $access_token;
            $instance->expires_in = $expires_in;
            $instance->scope = $scope;
            $instance->token_type = $token_type;
            return $instance;
        };
        return new class($constructor) extends AccessTokenResponseBuilder
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
        $instance = new self();
        $instance->access_token = isset($data['access_token']) ? ((string) $data['access_token']) : null;
        $instance->expires_in = isset($data['expires_in']) ? ((int) $data['expires_in']) : null;
        $instance->scope = isset($data['scope']) ? ((string) $data['scope']) : null;
        $instance->token_type = isset($data['token_type']) ? ((string) $data['token_type']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'access_token' => $this->access_token,
            'expires_in' => $this->expires_in,
            'scope' => $this->scope,
            'token_type' => $this->token_type
        ]);
    }
}
