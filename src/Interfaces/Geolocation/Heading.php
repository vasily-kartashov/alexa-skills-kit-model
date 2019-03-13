<?php

namespace Alexa\Model\Interfaces\Geolocation;

use \JsonSerializable;

final class Heading implements JsonSerializable
{
    /** @var float|null */
    private $directionInDegrees = null;

    /** @var float|null */
    private $accuracyInDegrees = null;

    protected function __construct()
    {
    }

    /**
     * @return float|null
     */
    public function directionInDegrees()
    {
        return $this->directionInDegrees;
    }

    /**
     * @return float|null
     */
    public function accuracyInDegrees()
    {
        return $this->accuracyInDegrees;
    }

    public static function builder(): HeadingBuilder
    {
        $instance = new self();
        $constructor = function ($directionInDegrees, $accuracyInDegrees) use ($instance): Heading {
            $instance->directionInDegrees = $directionInDegrees;
            $instance->accuracyInDegrees = $accuracyInDegrees;
            return $instance;
        };
        return new class($constructor) extends HeadingBuilder
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
        $instance->directionInDegrees = isset($data['directionInDegrees']) ? ((float) $data['directionInDegrees']) : null;
        $instance->accuracyInDegrees = isset($data['accuracyInDegrees']) ? ((float) $data['accuracyInDegrees']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'directionInDegrees' => $this->directionInDegrees,
            'accuracyInDegrees' => $this->accuracyInDegrees
        ]);
    }
}
