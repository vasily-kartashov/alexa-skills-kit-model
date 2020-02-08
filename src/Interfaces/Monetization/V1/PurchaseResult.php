<?php

namespace Alexa\Model\Interfaces\Monetization\V1;

use JsonSerializable;

final class PurchaseResult implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'ACCEPTED'          => new static('ACCEPTED'),
                'DECLINED'          => new static('DECLINED'),
                'NOT_ENTITLED'      => new static('NOT_ENTITLED'),
                'ERROR'             => new static('ERROR'),
                'ALREADY_PURCHASED' => new static('ALREADY_PURCHASED')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function ACCEPTED(): self
    {
        return static::values()['ACCEPTED'];
    }

    public static function DECLINED(): self
    {
        return static::values()['DECLINED'];
    }

    public static function NOT_ENTITLED(): self
    {
        return static::values()['NOT_ENTITLED'];
    }

    public static function ERROR(): self
    {
        return static::values()['ERROR'];
    }

    public static function ALREADY_PURCHASED(): self
    {
        return static::values()['ALREADY_PURCHASED'];
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
