<?php

namespace Alexa\Model\Interfaces\Geolocation;

use JsonSerializable;

final class Coordinate implements JsonSerializable
{
    /** @var float|null */
    private $latitudeInDegrees = null;

    /** @var float|null */
    private $longitudeInDegrees = null;

    /** @var float|null */
    private $accuracyInMeters = null;

    protected function __construct()
    {
    }

    /**
     * @return float|null
     */
    public function latitudeInDegrees()
    {
        return $this->latitudeInDegrees;
    }

    /**
     * @return float|null
     */
    public function longitudeInDegrees()
    {
        return $this->longitudeInDegrees;
    }

    /**
     * @return float|null
     */
    public function accuracyInMeters()
    {
        return $this->accuracyInMeters;
    }

    public static function builder(): CoordinateBuilder
    {
        $instance = new self;
        return new class($constructor = function ($latitudeInDegrees, $longitudeInDegrees, $accuracyInMeters) use ($instance): Coordinate {
            $instance->latitudeInDegrees = $latitudeInDegrees;
            $instance->longitudeInDegrees = $longitudeInDegrees;
            $instance->accuracyInMeters = $accuracyInMeters;
            return $instance;
        }) extends CoordinateBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->latitudeInDegrees = isset($data['latitudeInDegrees']) ? ((float) $data['latitudeInDegrees']) : null;
        $instance->longitudeInDegrees = isset($data['longitudeInDegrees']) ? ((float) $data['longitudeInDegrees']) : null;
        $instance->accuracyInMeters = isset($data['accuracyInMeters']) ? ((float) $data['accuracyInMeters']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'latitudeInDegrees' => $this->latitudeInDegrees,
            'longitudeInDegrees' => $this->longitudeInDegrees,
            'accuracyInMeters' => $this->accuracyInMeters
        ]);
    }
}
