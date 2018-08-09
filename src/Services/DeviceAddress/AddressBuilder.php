<?php

namespace Alexa\Model\Services\DeviceAddress;

abstract class AddressBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $addressLine1 = null;

    /** @var string|null */
    private $addressLine2 = null;

    /** @var string|null */
    private $addressLine3 = null;

    /** @var string|null */
    private $countryCode = null;

    /** @var string|null */
    private $stateOrRegion = null;

    /** @var string|null */
    private $city = null;

    /** @var string|null */
    private $districtOrCounty = null;

    /** @var string|null */
    private $postalCode = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withAddressLine1(string $addressLine1): self
    {
        $this->addressLine1 = $addressLine1;
        return $this;
    }

    public function withAddressLine2(string $addressLine2): self
    {
        $this->addressLine2 = $addressLine2;
        return $this;
    }

    public function withAddressLine3(string $addressLine3): self
    {
        $this->addressLine3 = $addressLine3;
        return $this;
    }

    public function withCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function withStateOrRegion(string $stateOrRegion): self
    {
        $this->stateOrRegion = $stateOrRegion;
        return $this;
    }

    public function withCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function withDistrictOrCounty(string $districtOrCounty): self
    {
        $this->districtOrCounty = $districtOrCounty;
        return $this;
    }

    public function withPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    public function build(): Address
    {
        return ($this->constructor)(
            $this->addressLine1,
            $this->addressLine2,
            $this->addressLine3,
            $this->countryCode,
            $this->stateOrRegion,
            $this->city,
            $this->districtOrCounty,
            $this->postalCode
        );
    }
}
