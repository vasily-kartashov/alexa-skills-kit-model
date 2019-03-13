<?php

namespace Alexa\Model;

abstract class DeviceBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $deviceId = null;

    /** @var SupportedInterfaces|null */
    private $supportedInterfaces = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $deviceId
     * @return self
     */
    public function withDeviceId(string $deviceId): self
    {
        $this->deviceId = $deviceId;
        return $this;
    }

    /**
     * @param SupportedInterfaces $supportedInterfaces
     * @return self
     */
    public function withSupportedInterfaces(SupportedInterfaces $supportedInterfaces): self
    {
        $this->supportedInterfaces = $supportedInterfaces;
        return $this;
    }

    public function build(): Device
    {
        return ($this->constructor)(
            $this->deviceId,
            $this->supportedInterfaces
        );
    }
}
