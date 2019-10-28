<?php

namespace Alexa\Model\Interfaces\Connections\Entities;

use \JsonSerializable;

final class PostalAddress extends BaseEntity implements JsonSerializable
{
    const TYPE = 'PostalAddress';

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

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function streetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @return string|null
     */
    public function locality()
    {
        return $this->locality;
    }

    /**
     * @return string|null
     */
    public function region()
    {
        return $this->region;
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
    public function country()
    {
        return $this->country;
    }

    public static function builder(): PostalAddressBuilder
    {
        $instance = new self;
        $constructor = function ($streetAddress, $locality, $region, $postalCode, $country) use ($instance): PostalAddress {
            $instance->streetAddress = $streetAddress;
            $instance->locality = $locality;
            $instance->region = $region;
            $instance->postalCode = $postalCode;
            $instance->country = $country;
            return $instance;
        };
        return new class($constructor) extends PostalAddressBuilder
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
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->streetAddress = isset($data['streetAddress']) ? ((string) $data['streetAddress']) : null;
        $instance->locality = isset($data['locality']) ? ((string) $data['locality']) : null;
        $instance->region = isset($data['region']) ? ((string) $data['region']) : null;
        $instance->postalCode = isset($data['postalCode']) ? ((string) $data['postalCode']) : null;
        $instance->country = isset($data['country']) ? ((string) $data['country']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'streetAddress' => $this->streetAddress,
            'locality' => $this->locality,
            'region' => $this->region,
            'postalCode' => $this->postalCode,
            'country' => $this->country
        ]);
    }
}
