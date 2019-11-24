<?php

namespace Alexa\Model;

abstract class UserBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $userId = null;

    /** @var string|null */
    private $accessToken = null;

    /** @var Permissions|null */
    private $permissions = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $userId
     * @return self
     */
    public function withUserId(string $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @param string $accessToken
     * @return self
     */
    public function withAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @param Permissions $permissions
     * @return self
     */
    public function withPermissions(Permissions $permissions): self
    {
        $this->permissions = $permissions;
        return $this;
    }

    public function build(): User
    {
        return ($this->constructor)(
            $this->userId,
            $this->accessToken,
            $this->permissions
        );
    }
}
