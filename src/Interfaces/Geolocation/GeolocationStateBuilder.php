<?php

namespace Alexa\Model\Interfaces\Geolocation;

abstract class GeolocationStateBuilder
{
    /** @var callable */
    private $constructor;

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

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $timestamp
     * @return self
     */
    public function withTimestamp(string $timestamp): self
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @param Coordinate $coordinate
     * @return self
     */
    public function withCoordinate(Coordinate $coordinate): self
    {
        $this->coordinate = $coordinate;
        return $this;
    }

    /**
     * @param Altitude $altitude
     * @return self
     */
    public function withAltitude(Altitude $altitude): self
    {
        $this->altitude = $altitude;
        return $this;
    }

    /**
     * @param Heading $heading
     * @return self
     */
    public function withHeading(Heading $heading): self
    {
        $this->heading = $heading;
        return $this;
    }

    /**
     * @param Speed $speed
     * @return self
     */
    public function withSpeed(Speed $speed): self
    {
        $this->speed = $speed;
        return $this;
    }

    /**
     * @param LocationServices $locationServices
     * @return self
     */
    public function withLocationServices(LocationServices $locationServices): self
    {
        $this->locationServices = $locationServices;
        return $this;
    }

    public function build(): GeolocationState
    {
        return ($this->constructor)(
            $this->timestamp,
            $this->coordinate,
            $this->altitude,
            $this->heading,
            $this->speed,
            $this->locationServices
        );
    }
}
