<?php

namespace Alexa\Model\Interfaces\Geolocation;

abstract class SpeedBuilder
{
    /** @var callable */
    private $constructor;

    /** @var float|null */
    private $speedInMetersPerSecond = null;

    /** @var float|null */
    private $accuracyInMetersPerSecond = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param float $speedInMetersPerSecond
     * @return self
     */
    public function withSpeedInMetersPerSecond(float $speedInMetersPerSecond): self
    {
        $this->speedInMetersPerSecond = $speedInMetersPerSecond;
        return $this;
    }

    /**
     * @param float $accuracyInMetersPerSecond
     * @return self
     */
    public function withAccuracyInMetersPerSecond(float $accuracyInMetersPerSecond): self
    {
        $this->accuracyInMetersPerSecond = $accuracyInMetersPerSecond;
        return $this;
    }

    public function build(): Speed
    {
        return ($this->constructor)(
            $this->speedInMetersPerSecond,
            $this->accuracyInMetersPerSecond
        );
    }
}
