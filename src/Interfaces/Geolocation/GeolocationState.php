<?php

namespace Alexa\Model\Interfaces\Geolocation;

use JsonSerializable;

final class GeolocationState implements JsonSerializable
{
    /** @var string|null */
    private $timestamp = null;

    /** @var Coordinate|null */
    private $coordinate = null;

    /** @var Altitude|null */
    private $altitude = null;

    /** @var Heading|null */
    private $heading = null;

    /** @var Speed|null */
    private $speed = null;

    /** @var LocationServices|null */
    private $locationServices = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function timestamp()
    {
        return $this->timestamp;
    }

    /**
     * @return Coordinate|null
     */
    public function coordinate()
    {
        return $this->coordinate;
    }

    /**
     * @return Altitude|null
     */
    public function altitude()
    {
        return $this->altitude;
    }

    /**
     * @return Heading|null
     */
    public function heading()
    {
        return $this->heading;
    }

    /**
     * @return Speed|null
     */
    public function speed()
    {
        return $this->speed;
    }

    /**
     * @return LocationServices|null
     */
    public function locationServices()
    {
        return $this->locationServices;
    }

    public static function builder(): GeolocationStateBuilder
    {
        $instance = new self;
        return new class($constructor = function ($timestamp, $coordinate, $altitude, $heading, $speed, $locationServices) use ($instance): GeolocationState {
            $instance->timestamp = $timestamp;
            $instance->coordinate = $coordinate;
            $instance->altitude = $altitude;
            $instance->heading = $heading;
            $instance->speed = $speed;
            $instance->locationServices = $locationServices;
            return $instance;
        }) extends GeolocationStateBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->timestamp = isset($data['timestamp']) ? ((string) $data['timestamp']) : null;
        $instance->coordinate = isset($data['coordinate']) ? Coordinate::fromValue($data['coordinate']) : null;
        $instance->altitude = isset($data['altitude']) ? Altitude::fromValue($data['altitude']) : null;
        $instance->heading = isset($data['heading']) ? Heading::fromValue($data['heading']) : null;
        $instance->speed = isset($data['speed']) ? Speed::fromValue($data['speed']) : null;
        $instance->locationServices = isset($data['locationServices']) ? LocationServices::fromValue($data['locationServices']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'timestamp' => $this->timestamp,
            'coordinate' => $this->coordinate,
            'altitude' => $this->altitude,
            'heading' => $this->heading,
            'speed' => $this->speed,
            'locationServices' => $this->locationServices
        ]);
    }
}
