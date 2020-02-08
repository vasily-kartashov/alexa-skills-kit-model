<?php

namespace Alexa\Model\Interfaces\Geolocation;

use JsonSerializable;

final class Altitude implements JsonSerializable
{
    /** @var float|null */
    private $altitudeInMeters = null;

    /** @var float|null */
    private $accuracyInMeters = null;

    protected function __construct()
    {
    }

    /**
     * @return float|null
     */
    public function altitudeInMeters()
    {
        return $this->altitudeInMeters;
    }

    /**
     * @return float|null
     */
    public function accuracyInMeters()
    {
        return $this->accuracyInMeters;
    }

    public static function builder(): AltitudeBuilder
    {
        $instance = new self;
        return new class($constructor = function ($altitudeInMeters, $accuracyInMeters) use ($instance): Altitude {
            $instance->altitudeInMeters = $altitudeInMeters;
            $instance->accuracyInMeters = $accuracyInMeters;
            return $instance;
        }) extends AltitudeBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->altitudeInMeters = isset($data['altitudeInMeters']) ? ((float) $data['altitudeInMeters']) : null;
        $instance->accuracyInMeters = isset($data['accuracyInMeters']) ? ((float) $data['accuracyInMeters']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'altitudeInMeters' => $this->altitudeInMeters,
            'accuracyInMeters' => $this->accuracyInMeters
        ]);
    }
}
