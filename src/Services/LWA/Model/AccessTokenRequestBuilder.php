<?php

namespace Alexa\Model\Services\LWA\Model;

abstract class AccessTokenRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $client_id = null;

    /** @var string|null */
    private $client_secret = null;

    /** @var string|null */
    private $refresh_token = null;

    /** @var string|null */
    private $scope = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $client_id
     * @return self
     */
    public function withClient_id(string $client_id): self
    {
        $this->client_id = $client_id;
        return $this;
    }

    /**
     * @param string $client_secret
     * @return self
     */
    public function withClient_secret(string $client_secret): self
    {
        $this->client_secret = $client_secret;
        return $this;
    }

    /**
     * @param string $refresh_token
     * @return self
     */
    public function withRefresh_token(string $refresh_token): self
    {
        $this->refresh_token = $refresh_token;
        return $this;
    }

    /**
     * @param string $scope
     * @return self
     */
    public function withScope(string $scope): self
    {
        $this->scope = $scope;
        return $this;
    }

    public function build(): AccessTokenRequest
    {
        return ($this->constructor)(
            $this->client_id,
            $this->client_secret,
            $this->refresh_token,
            $this->scope
        );
    }
}
