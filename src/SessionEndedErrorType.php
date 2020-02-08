<?php

namespace Alexa\Model;

use JsonSerializable;

final class SessionEndedErrorType implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'INVALID_RESPONSE'           => new static('INVALID_RESPONSE'),
                'DEVICE_COMMUNICATION_ERROR' => new static('DEVICE_COMMUNICATION_ERROR'),
                'INTERNAL_SERVICE_ERROR'     => new static('INTERNAL_SERVICE_ERROR'),
                'ENDPOINT_TIMEOUT'           => new static('ENDPOINT_TIMEOUT')
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
        return static::values()['INVALID_RESPONSE'];
    }

    public static function DEVICE_COMMUNICATION_ERROR(): self
    {
        return static::values()['DEVICE_COMMUNICATION_ERROR'];
    }

    public static function INTERNAL_SERVICE_ERROR(): self
    {
        return static::values()['INTERNAL_SERVICE_ERROR'];
    }

    public static function ENDPOINT_TIMEOUT(): self
    {
        return static::values()['ENDPOINT_TIMEOUT'];
    }

    /**
     * @param string $text
     * @return self|null
     */
    public static function fromValue(string $text)
    {
        return static::values()[$text] ?? null;
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
