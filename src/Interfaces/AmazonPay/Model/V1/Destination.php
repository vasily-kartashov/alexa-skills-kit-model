<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

use \JsonSerializable;

final class Destination implements JsonSerializable
{
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

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function companyName()
    {
        return $this->companyName;
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
    public function stateOrRegion()
    {
        return $this->stateOrRegion;
    }

    /**
     * @return string|null
     */
    public function postalCode()
    {
        return $this->postalCode;
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
    public function phone()
    {
        return $this->phone;
    }

    public static function builder(): DestinationBuilder
    {
        $instance = new self();
        $constructor = function ($name, $companyName, $addressLine1, $addressLine2, $addressLine3, $city, $districtOrCounty, $stateOrRegion, $postalCode, $countryCode, $phone) use ($instance): Destination {
            $instance->name = $name;
            $instance->companyName = $companyName;
            $instance->addressLine1 = $addressLine1;
            $instance->addressLine2 = $addressLine2;
            $instance->addressLine3 = $addressLine3;
            $instance->city = $city;
            $instance->districtOrCounty = $districtOrCounty;
            $instance->stateOrRegion = $stateOrRegion;
            $instance->postalCode = $postalCode;
            $instance->countryCode = $countryCode;
            $instance->phone = $phone;
            return $instance;
        };
        return new class($constructor) extends DestinationBuilder
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
        $instance->name = isset($data['name']) ? ((string) $data['name']) : null;
        $instance->companyName = isset($data['companyName']) ? ((string) $data['companyName']) : null;
        $instance->addressLine1 = isset($data['addressLine1']) ? ((string) $data['addressLine1']) : null;
        $instance->addressLine2 = isset($data['addressLine2']) ? ((string) $data['addressLine2']) : null;
        $instance->addressLine3 = isset($data['addressLine3']) ? ((string) $data['addressLine3']) : null;
        $instance->city = isset($data['city']) ? ((string) $data['city']) : null;
        $instance->districtOrCounty = isset($data['districtOrCounty']) ? ((string) $data['districtOrCounty']) : null;
        $instance->stateOrRegion = isset($data['stateOrRegion']) ? ((string) $data['stateOrRegion']) : null;
        $instance->postalCode = isset($data['postalCode']) ? ((string) $data['postalCode']) : null;
        $instance->countryCode = isset($data['countryCode']) ? ((string) $data['countryCode']) : null;
        $instance->phone = isset($data['phone']) ? ((string) $data['phone']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'companyName' => $this->companyName,
            'addressLine1' => $this->addressLine1,
            'addressLine2' => $this->addressLine2,
            'addressLine3' => $this->addressLine3,
            'city' => $this->city,
            'districtOrCounty' => $this->districtOrCounty,
            'stateOrRegion' => $this->stateOrRegion,
            'postalCode' => $this->postalCode,
            'countryCode' => $this->countryCode,
            'phone' => $this->phone
        ]);
    }
}
