<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\Response;

abstract class DestinationBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $name = null;

    /** @var string|null */
    private $companyName = null;

    /** @var string|null */
    private $addressLine1 = null;

    /** @var string|null */
    private $addressLine2 = null;

    /** @var string|null */
    private $addressLine3 = null;

    /** @var string|null */
    private $city = null;

    /** @var string|null */
    private $districtOrCounty = null;

    /** @var string|null */
    private $stateOrRegion = null;

    /** @var string|null */
    private $postalCode = null;

    /** @var string|null */
    private $countryCode = null;

    /** @var string|null */
    private $phone = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $name
     * @return self
     */
    public function withName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $companyName
     * @return self
     */
    public function withCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @param string $addressLine1
     * @return self
     */
    public function withAddressLine1(string $addressLine1): self
    {
        $this->addressLine1 = $addressLine1;
        return $this;
    }

    /**
     * @param string $addressLine2
     * @return self
     */
    public function withAddressLine2(string $addressLine2): self
    {
        $this->addressLine2 = $addressLine2;
        return $this;
    }

    /**
     * @param string $addressLine3
     * @return self
     */
    public function withAddressLine3(string $addressLine3): self
    {
        $this->addressLine3 = $addressLine3;
        return $this;
    }

    /**
     * @param string $city
     * @return self
     */
    public function withCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @param string $districtOrCounty
     * @return self
     */
    public function withDistrictOrCounty(string $districtOrCounty): self
    {
        $this->districtOrCounty = $districtOrCounty;
        return $this;
    }

    /**
     * @param string $stateOrRegion
     * @return self
     */
    public function withStateOrRegion(string $stateOrRegion): self
    {
        $this->stateOrRegion = $stateOrRegion;
        return $this;
    }

    /**
     * @param string $postalCode
     * @return self
     */
    public function withPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @param string $countryCode
     * @return self
     */
    public function withCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @param string $phone
     * @return self
     */
    public function withPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function build(): Destination
    {
        return ($this->constructor)(
            $this->name,
            $this->companyName,
            $this->addressLine1,
            $this->addressLine2,
            $this->addressLine3,
            $this->city,
            $this->districtOrCounty,
            $this->stateOrRegion,
            $this->postalCode,
            $this->countryCode,
            $this->phone
        );
    }
}
