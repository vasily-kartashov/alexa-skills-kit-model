<?php

namespace Alexa\Model\SLU\EntityResolution;

use JsonSerializable;

final class StatusCode implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'ER_SUCCESS_MATCH'    => new static('ER_SUCCESS_MATCH'),
                'ER_SUCCESS_NO_MATCH' => new static('ER_SUCCESS_NO_MATCH'),
                'ER_ERROR_TIMEOUT'    => new static('ER_ERROR_TIMEOUT'),
                'ER_ERROR_EXCEPTION'  => new static('ER_ERROR_EXCEPTION')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function ER_SUCCESS_MATCH(): self
    {
        return static::values()['ER_SUCCESS_MATCH'];
    }

    public static function ER_SUCCESS_NO_MATCH(): self
    {
        return static::values()['ER_SUCCESS_NO_MATCH'];
    }

    public static function ER_ERROR_TIMEOUT(): self
    {
        return static::values()['ER_ERROR_TIMEOUT'];
    }

    public static function ER_ERROR_EXCEPTION(): self
    {
        return static::values()['ER_ERROR_EXCEPTION'];
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
