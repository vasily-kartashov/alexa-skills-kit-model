<?php

namespace Alexa\Model\Services\DeviceAddress;

use JsonSerializable;

final class ShortAddress implements JsonSerializable
{
    /** @var string|null */
    private $countryCode = null;

    /** @var string|null */
    private $postalCode = null;

    protected function __construct()
    {
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
    public function postalCode()
    {
        return $this->postalCode;
    }

    public static function builder(): ShortAddressBuilder
    {
        $instance = new self;
        return new class($constructor = function ($countryCode, $postalCode) use ($instance): ShortAddress {
            $instance->countryCode = $countryCode;
            $instance->postalCode = $postalCode;
            return $instance;
        }) extends ShortAddressBuilder {};
    }

    /**
     * @param string $countryCode
     * @return self
     */
    public static function ofCountryCode(string $countryCode): ShortAddress
    {
        $instance = new self;
        $instance->countryCode = $countryCode;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->countryCode = isset($data['countryCode']) ? ((string) $data['countryCode']) : null;
        $instance->postalCode = isset($data['postalCode']) ? ((string) $data['postalCode']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'countryCode' => $this->countryCode,
            'postalCode' => $this->postalCode
        ]);
    }
}
