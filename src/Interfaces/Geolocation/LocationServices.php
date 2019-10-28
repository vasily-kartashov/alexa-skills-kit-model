<?php

namespace Alexa\Model\Interfaces\Geolocation;

use \JsonSerializable;

final class LocationServices implements JsonSerializable
{
    /** @var Status|null */
    private $status = null;

    /** @var Access|null */
    private $access = null;

    protected function __construct()
    {
    }

    /**
     * @return Status|null
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return Access|null
     */
    public function access()
    {
        return $this->access;
    }

    public static function builder(): LocationServicesBuilder
    {
        $instance = new self;
        $constructor = function ($status, $access) use ($instance): LocationServices {
            $instance->status = $status;
            $instance->access = $access;
            return $instance;
        };
        return new class($constructor) extends LocationServicesBuilder
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
        $instance->status = isset($data['status']) ? Status::fromValue($data['status']) : null;
        $instance->access = isset($data['access']) ? Access::fromValue($data['access']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'status' => $this->status,
            'access' => $this->access
        ]);
    }
}
