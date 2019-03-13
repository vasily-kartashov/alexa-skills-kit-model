<?php

namespace Alexa\Model\Interfaces\System;

use Alexa\Model\Application;
use Alexa\Model\Device;
use Alexa\Model\User;

abstract class SystemStateBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Application|null */
    private $application = null;

    /** @var User|null */
    private $user = null;

    /** @var Device|null */
    private $device = null;

    /** @var string|null */
    private $apiEndpoint = null;

    /** @var string|null */
    private $apiAccessToken = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $application
     * @return self
     */
    public function withApplication(Application $application): self
    {
        $this->application = $application;
        return $this;
    }

    /**
     * @param mixed $user
     * @return self
     */
    public function withUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param mixed $device
     * @return self
     */
    public function withDevice(Device $device): self
    {
        $this->device = $device;
        return $this;
    }

    /**
     * @param mixed $apiEndpoint
     * @return self
     */
    public function withApiEndpoint(string $apiEndpoint): self
    {
        $this->apiEndpoint = $apiEndpoint;
        return $this;
    }

    /**
     * @param mixed $apiAccessToken
     * @return self
     */
    public function withApiAccessToken(string $apiAccessToken): self
    {
        $this->apiAccessToken = $apiAccessToken;
        return $this;
    }

    public function build(): SystemState
    {
        return ($this->constructor)(
            $this->application,
            $this->user,
            $this->device,
            $this->apiEndpoint,
            $this->apiAccessToken
        );
    }
}
