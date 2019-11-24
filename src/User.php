<?php

namespace Alexa\Model;

use JsonSerializable;

final class User implements JsonSerializable
{
    /** @var string|null */
    private $userId = null;

    /** @var string|null */
    private $accessToken = null;

    /** @var Permissions|null */
    private $permissions = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function userId()
    {
        return $this->userId;
    }

    /**
     * @return string|null
     */
    public function accessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return Permissions|null
     */
    public function permissions()
    {
        return $this->permissions;
    }

    public static function builder(): UserBuilder
    {
        $instance = new self;
        return new class($constructor = function ($userId, $accessToken, $permissions) use ($instance): User {
            $instance->userId = $userId;
            $instance->accessToken = $accessToken;
            $instance->permissions = $permissions;
            return $instance;
        }) extends UserBuilder {};
    }

    /**
     * @param string $userId
     * @return self
     */
    public static function ofUserId(string $userId): User
    {
        $instance = new self;
        $instance->userId = $userId;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->userId = isset($data['userId']) ? ((string) $data['userId']) : null;
        $instance->accessToken = isset($data['accessToken']) ? ((string) $data['accessToken']) : null;
        $instance->permissions = isset($data['permissions']) ? Permissions::fromValue($data['permissions']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'userId' => $this->userId,
            'accessToken' => $this->accessToken,
            'permissions' => $this->permissions
        ]);
    }
}
