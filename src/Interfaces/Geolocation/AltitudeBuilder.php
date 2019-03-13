<?php

namespace Alexa\Model\Interfaces\Geolocation;

abstract class AltitudeBuilder
{
    /** @var callable */
    private $constructor;

    /** @var float|null */
    private $altitudeInMeters = null;

    /** @var float|null */
    private $accuracyInMeters = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $altitudeInMeters
     * @return self
     */
    public function withAltitudeInMeters(float $altitudeInMeters): self
    {
        $this->altitudeInMeters = $altitudeInMeters;
        return $this;
    }

    /**
     * @param mixed $accuracyInMeters
     * @return self
     */
    public function withAccuracyInMeters(float $accuracyInMeters): self
    {
        $this->accuracyInMeters = $accuracyInMeters;
        return $this;
    }

    public function build(): Altitude
    {
        return ($this->constructor)(
            $this->altitudeInMeters,
            $this->accuracyInMeters
        );
    }
}
