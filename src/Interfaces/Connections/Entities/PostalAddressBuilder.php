<?php

namespace Alexa\Model\Interfaces\Connections\Entities;

abstract class PostalAddressBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $streetAddress = null;

    /** @var string|null */
    private $locality = null;

    /** @var string|null */
    private $region = null;

    /** @var string|null */
    private $postalCode = null;

    /** @var string|null */
    private $country = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withStreetAddress(string $streetAddress): self
    {
        $this->streetAddress = $streetAddress;
        return $this;
    }

    public function withLocality(string $locality): self
    {
        $this->locality = $locality;
        return $this;
    }

    public function withRegion(string $region): self
    {
        $this->region = $region;
        return $this;
    }

    public function withPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    public function withCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    public function build(): PostalAddress
    {
        return ($this->constructor)(
            $this->streetAddress,
            $this->locality,
            $this->region,
            $this->postalCode,
            $this->country
        );
    }
}
