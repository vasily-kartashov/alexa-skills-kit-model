<?php

namespace Alexa\Model\Interfaces\Geolocation;

use \JsonSerializable;

final class GeolocationInterface implements JsonSerializable
{
    protected function __construct()
    {
    }

    public static function builder(): GeolocationInterfaceBuilder
    {
        $instance = new self();
        $constructor = function () use ($instance): GeolocationInterface {
            return $instance;
        };
        return new class($constructor) extends GeolocationInterfaceBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self();
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            
        ]);
    }
}
