<?php

namespace Alexa\Model\Interfaces\Geolocation;

use \JsonSerializable;

final class Speed implements JsonSerializable
{
    /** @var float|null */
    private $speedInMetersPerSecond = null;

    /** @var float|null */
    private $accuracyInMetersPerSecond = null;

    protected function __construct()
    {
    }

    /**
     * @return float|null
     */
    public function speedInMetersPerSecond()
    {
        return $this->speedInMetersPerSecond;
    }

    /**
     * @return float|null
     */
    public function accuracyInMetersPerSecond()
    {
        return $this->accuracyInMetersPerSecond;
    }

    public static function builder(): SpeedBuilder
    {
        $instance = new self;
        $constructor = function ($speedInMetersPerSecond, $accuracyInMetersPerSecond) use ($instance): Speed {
            $instance->speedInMetersPerSecond = $speedInMetersPerSecond;
            $instance->accuracyInMetersPerSecond = $accuracyInMetersPerSecond;
            return $instance;
        };
        return new class($constructor) extends SpeedBuilder
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
        $instance->speedInMetersPerSecond = isset($data['speedInMetersPerSecond']) ? ((float) $data['speedInMetersPerSecond']) : null;
        $instance->accuracyInMetersPerSecond = isset($data['accuracyInMetersPerSecond']) ? ((float) $data['accuracyInMetersPerSecond']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'speedInMetersPerSecond' => $this->speedInMetersPerSecond,
            'accuracyInMetersPerSecond' => $this->accuracyInMetersPerSecond
        ]);
    }
}
