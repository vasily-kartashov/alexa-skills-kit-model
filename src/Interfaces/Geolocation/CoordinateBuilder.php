<?php

namespace Alexa\Model\Interfaces\Geolocation;

abstract class CoordinateBuilder
{
    /** @var callable */
    private $constructor;

    /** @var float|null */
    private $latitudeInDegrees = null;

    /** @var float|null */
    private $longitudeInDegrees = null;

    /** @var float|null */
    private $accuracyInMeters = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param float $latitudeInDegrees
     * @return self
     */
    public function withLatitudeInDegrees(float $latitudeInDegrees): self
    {
        $this->latitudeInDegrees = $latitudeInDegrees;
        return $this;
    }

    /**
     * @param float $longitudeInDegrees
     * @return self
     */
    public function withLongitudeInDegrees(float $longitudeInDegrees): self
    {
        $this->longitudeInDegrees = $longitudeInDegrees;
        return $this;
    }

    /**
     * @param float $accuracyInMeters
     * @return self
     */
    public function withAccuracyInMeters(float $accuracyInMeters): self
    {
        $this->accuracyInMeters = $accuracyInMeters;
        return $this;
    }

    public function build(): Coordinate
    {
        return ($this->constructor)(
            $this->latitudeInDegrees,
            $this->longitudeInDegrees,
            $this->accuracyInMeters
        );
    }
}
