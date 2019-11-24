<?php

namespace Alexa\Model\Interfaces\Geolocation;

use JsonSerializable;

final class GeolocationInterface implements JsonSerializable
{
    protected function __construct()
    {
    }

    public static function empty(): GeolocationInterface
    {
        return new self;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            
        ]);
    }
}
