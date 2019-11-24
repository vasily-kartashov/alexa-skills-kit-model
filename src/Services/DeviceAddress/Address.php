<?php

namespace Alexa\Model\Services\DeviceAddress;

use JsonSerializable;

final class Address implements JsonSerializable
{
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

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function addressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @return string|null
     */
    public function addressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @return string|null
     */
    public function addressLine3()
    {
        return $this->addressLine3;
    }

    /**
     * @return string|null
     */
    public function countryCode()
    {
        return $this->countryCode;
    }

    /**
     * @return string|null
     */
    public function stateOrRegion()
    {
        return $this->stateOrRegion;
    }

    /**
     * @return string|null
     */
    public function city()
    {
        return $this->city;
    }

    /**
     * @return string|null
     */
    public function districtOrCounty()
    {
        return $this->districtOrCounty;
    }

    /**
     * @return string|null
     */
    public function postalCode()
    {
        return $this->postalCode;
    }

    public static function builder(): AddressBuilder
    {
        $instance = new self;
        return new class($constructor = function ($addressLine1, $addressLine2, $addressLine3, $countryCode, $stateOrRegion, $city, $districtOrCounty, $postalCode) use ($instance): Address {
            $instance->addressLine1 = $addressLine1;
            $instance->addressLine2 = $addressLine2;
            $instance->addressLine3 = $addressLine3;
            $instance->countryCode = $countryCode;
            $instance->stateOrRegion = $stateOrRegion;
            $instance->city = $city;
            $instance->districtOrCounty = $districtOrCounty;
            $instance->postalCode = $postalCode;
            return $instance;
        }) extends AddressBuilder {};
    }

    /**
     * @param string $addressLine1
     * @return self
     */
    public static function ofAddressLine1(string $addressLine1): Address
    {
        $instance = new self;
        $instance->addressLine1 = $addressLine1;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->addressLine1 = isset($data['addressLine1']) ? ((string) $data['addressLine1']) : null;
        $instance->addressLine2 = isset($data['addressLine2']) ? ((string) $data['addressLine2']) : null;
        $instance->addressLine3 = isset($data['addressLine3']) ? ((string) $data['addressLine3']) : null;
        $instance->countryCode = isset($data['countryCode']) ? ((string) $data['countryCode']) : null;
        $instance->stateOrRegion = isset($data['stateOrRegion']) ? ((string) $data['stateOrRegion']) : null;
        $instance->city = isset($data['city']) ? ((string) $data['city']) : null;
        $instance->districtOrCounty = isset($data['districtOrCounty']) ? ((string) $data['districtOrCounty']) : null;
        $instance->postalCode = isset($data['postalCode']) ? ((string) $data['postalCode']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'addressLine1' => $this->addressLine1,
            'addressLine2' => $this->addressLine2,
            'addressLine3' => $this->addressLine3,
            'countryCode' => $this->countryCode,
            'stateOrRegion' => $this->stateOrRegion,
            'city' => $this->city,
            'districtOrCounty' => $this->districtOrCounty,
            'postalCode' => $this->postalCode
        ]);
    }
}
