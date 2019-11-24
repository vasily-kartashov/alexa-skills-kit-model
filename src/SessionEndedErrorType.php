<?php

namespace Alexa\Model;

use JsonSerializable;

final class SessionEndedErrorType implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'INVALID_RESPONSE' => new static('INVALID_RESPONSE'),
                'DEVICE_COMMUNICATION_ERROR' => new static('DEVICE_COMMUNICATION_ERROR'),
                'INTERNAL_SERVICE_ERROR' => new static('INTERNAL_SERVICE_ERROR'),
                'ENDPOINT_TIMEOUT' => new static('ENDPOINT_TIMEOUT'),
                'null' => new static('null')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function INVALID_RESPONSE(): self
    {
        return static::instances()['INVALID_RESPONSE'];
    }

    public static function DEVICE_COMMUNICATION_ERROR(): self
    {
        return static::instances()['DEVICE_COMMUNICATION_ERROR'];
    }

    public static function INTERNAL_SERVICE_ERROR(): self
    {
        return static::instances()['INTERNAL_SERVICE_ERROR'];
    }

    public static function ENDPOINT_TIMEOUT(): self
    {
        return static::instances()['ENDPOINT_TIMEOUT'];
    }

    public static function NULL(): self
    {
        return static::instances()['null'];
    }

    /**
     * @param string $text
     * @return self|null
     */
    public static function fromValue(string $text)
    {
        return static::instances()[$text] ?? null;
    }

    /**
     * @return self[]
     */
    public static function values()
    {
        return static::instances();
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
