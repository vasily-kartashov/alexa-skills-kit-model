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

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withUserId(string $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    public function withAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }

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
