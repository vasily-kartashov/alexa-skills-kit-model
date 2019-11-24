<?php

namespace Alexa\Model;

use JsonSerializable;

final class Device implements JsonSerializable
{
    /** @var string|null */
    private $deviceId = null;

    /** @var SupportedInterfaces|null */
    private $supportedInterfaces = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function deviceId()
    {
        return $this->deviceId;
    }

    /**
     * @return SupportedInterfaces|null
     */
    public function supportedInterfaces()
    {
        return $this->supportedInterfaces;
    }

    public static function builder(): DeviceBuilder
    {
        $instance = new self;
        return new class($constructor = function ($deviceId, $supportedInterfaces) use ($instance): Device {
            $instance->deviceId = $deviceId;
            $instance->supportedInterfaces = $supportedInterfaces;
            return $instance;
        }) extends DeviceBuilder {};
    }

    /**
     * @param string $deviceId
     * @return self
     */
    public static function ofDeviceId(string $deviceId): Device
    {
        $instance = new self;
        $instance->deviceId = $deviceId;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->deviceId = isset($data['deviceId']) ? ((string) $data['deviceId']) : null;
        $instance->supportedInterfaces = isset($data['supportedInterfaces']) ? SupportedInterfaces::fromValue($data['supportedInterfaces']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'deviceId' => $this->deviceId,
            'supportedInterfaces' => $this->supportedInterfaces
        ]);
    }
}
