<?php

namespace Alexa\Model\Services\Lwa\Model;

abstract class AccessTokenResponseBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $access_token = null;

    /** @var int|null */
    private $expires_in = null;

    /** @var string|null */
    private $scope = null;

    /** @var string|null */
    private $token_type = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $access_token
     * @return self
     */
    public function withAccess_token(string $access_token): self
    {
        $this->access_token = $access_token;
        return $this;
    }

    /**
     * @param mixed $expires_in
     * @return self
     */
    public function withExpires_in(int $expires_in): self
    {
        $this->expires_in = $expires_in;
        return $this;
    }

    /**
     * @param mixed $scope
     * @return self
     */
    public function withScope(string $scope): self
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * @param mixed $token_type
     * @return self
     */
    public function withToken_type(string $token_type): self
    {
        $this->token_type = $token_type;
        return $this;
    }

    public function build(): AccessTokenResponse
    {
        return ($this->constructor)(
            $this->access_token,
            $this->expires_in,
            $this->scope,
            $this->token_type
        );
    }
}
