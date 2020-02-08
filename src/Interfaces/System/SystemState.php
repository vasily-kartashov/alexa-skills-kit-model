<?php

namespace Alexa\Model\Interfaces\System;

use Alexa\Model\Application;
use Alexa\Model\Device;
use Alexa\Model\Person;
use Alexa\Model\User;
use JsonSerializable;

final class SystemState implements JsonSerializable
{
    /** @var Application|null */
    private $application = null;

    /** @var User|null */
    private $user = null;

    /** @var Device|null */
    private $device = null;

    /** @var Person|null */
    private $person = null;

    /** @var string|null */
    private $apiEndpoint = null;

    /** @var string|null */
    private $apiAccessToken = null;

    protected function __construct()
    {
    }

    /**
     * @return Application|null
     */
    public function application()
    {
        return $this->application;
    }

    /**
     * @return User|null
     */
    public function user()
    {
        return $this->user;
    }

    /**
     * @return Device|null
     */
    public function device()
    {
        return $this->device;
    }

    /**
     * @return Person|null
     */
    public function person()
    {
        return $this->person;
    }

    /**
     * @return string|null
     */
    public function apiEndpoint()
    {
        return $this->apiEndpoint;
    }

    /**
     * @return string|null
     */
    public function apiAccessToken()
    {
        return $this->apiAccessToken;
    }

    public static function builder(): SystemStateBuilder
    {
        $instance = new self;
        return new class($constructor = function ($application, $user, $device, $person, $apiEndpoint, $apiAccessToken) use ($instance): SystemState {
            $instance->application = $application;
            $instance->user = $user;
            $instance->device = $device;
            $instance->person = $person;
            $instance->apiEndpoint = $apiEndpoint;
            $instance->apiAccessToken = $apiAccessToken;
            return $instance;
        }) extends SystemStateBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->application = isset($data['application']) ? Application::fromValue($data['application']) : null;
        $instance->user = isset($data['user']) ? User::fromValue($data['user']) : null;
        $instance->device = isset($data['device']) ? Device::fromValue($data['device']) : null;
        $instance->person = isset($data['person']) ? Person::fromValue($data['person']) : null;
        $instance->apiEndpoint = isset($data['apiEndpoint']) ? ((string) $data['apiEndpoint']) : null;
        $instance->apiAccessToken = isset($data['apiAccessToken']) ? ((string) $data['apiAccessToken']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'application' => $this->application,
            'user' => $this->user,
            'device' => $this->device,
            'person' => $this->person,
            'apiEndpoint' => $this->apiEndpoint,
            'apiAccessToken' => $this->apiAccessToken
        ]);
    }
}
