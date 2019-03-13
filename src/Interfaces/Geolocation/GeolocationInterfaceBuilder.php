<?php

namespace Alexa\Model\Interfaces\Geolocation;

abstract class GeolocationInterfaceBuilder
{
    /** @var callable */
    private $constructor;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function build(): GeolocationInterface
    {
        return ($this->constructor)(
            
        );
    }
}
