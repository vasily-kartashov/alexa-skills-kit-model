<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use JsonSerializable;

final class ErrorType implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'MEDIA_ERROR_INTERNAL_DEVICE_ERROR' => new static('MEDIA_ERROR_INTERNAL_DEVICE_ERROR'),
                'MEDIA_ERROR_INTERNAL_SERVER_ERROR' => new static('MEDIA_ERROR_INTERNAL_SERVER_ERROR'),
                'MEDIA_ERROR_INVALID_REQUEST' => new static('MEDIA_ERROR_INVALID_REQUEST'),
                'MEDIA_ERROR_SERVICE_UNAVAILABLE' => new static('MEDIA_ERROR_SERVICE_UNAVAILABLE'),
                'MEDIA_ERROR_UNKNOWN' => new static('MEDIA_ERROR_UNKNOWN'),
                'null' => new static('null')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function MEDIA_ERROR_INTERNAL_DEVICE_ERROR(): self
    {
        return static::instances()['MEDIA_ERROR_INTERNAL_DEVICE_ERROR'];
    }

    public static function MEDIA_ERROR_INTERNAL_SERVER_ERROR(): self
    {
        return static::instances()['MEDIA_ERROR_INTERNAL_SERVER_ERROR'];
    }

    public static function MEDIA_ERROR_INVALID_REQUEST(): self
    {
        return static::instances()['MEDIA_ERROR_INVALID_REQUEST'];
    }

    public static function MEDIA_ERROR_SERVICE_UNAVAILABLE(): self
    {
        return static::instances()['MEDIA_ERROR_SERVICE_UNAVAILABLE'];
    }

    public static function MEDIA_ERROR_UNKNOWN(): self
    {
        return static::instances()['MEDIA_ERROR_UNKNOWN'];
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
