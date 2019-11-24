<?php

namespace Alexa\Model\Interfaces\Monetization\V1;

use JsonSerializable;

final class PurchaseResult implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'ACCEPTED' => new static('ACCEPTED'),
                'DECLINED' => new static('DECLINED'),
                'NOT_ENTITLED' => new static('NOT_ENTITLED'),
                'ERROR' => new static('ERROR'),
                'ALREADY_PURCHASED' => new static('ALREADY_PURCHASED'),
                'null' => new static('null')
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
        return static::instances()['ACCEPTED'];
    }

    public static function DECLINED(): self
    {
        return static::instances()['DECLINED'];
    }

    public static function NOT_ENTITLED(): self
    {
        return static::instances()['NOT_ENTITLED'];
    }

    public static function ERROR(): self
    {
        return static::instances()['ERROR'];
    }

    public static function ALREADY_PURCHASED(): self
    {
        return static::instances()['ALREADY_PURCHASED'];
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
