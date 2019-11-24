<?php

namespace Alexa\Model\Interfaces\System;

use Alexa\Model\Application;
use Alexa\Model\Device;
use Alexa\Model\Person;
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

    /** @var Person|null */
    private $person = null;

    /** @var string|null */
    private $apiEndpoint = null;

    /** @var string|null */
    private $apiAccessToken = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Application $application
     * @return self
     */
    public function withApplication(Application $application): self
    {
        $this->application = $application;
        return $this;
    }

    /**
     * @param User $user
     * @return self
     */
    public function withUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param Device $device
     * @return self
     */
    public function withDevice(Device $device): self
    {
        $this->device = $device;
        return $this;
    }

    /**
     * @param Person $person
     * @return self
     */
    public function withPerson(Person $person): self
    {
        $this->person = $person;
        return $this;
    }

    /**
     * @param string $apiEndpoint
     * @return self
     */
    public function withApiEndpoint(string $apiEndpoint): self
    {
        $this->apiEndpoint = $apiEndpoint;
        return $this;
    }

    /**
     * @param string $apiAccessToken
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
            $this->person,
            $this->apiEndpoint,
            $this->apiAccessToken
        );
    }
}
