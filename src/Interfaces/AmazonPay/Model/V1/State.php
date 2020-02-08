<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

use JsonSerializable;

final class State implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'Pending'   => new static('Pending'),
                'Open'      => new static('Open'),
                'Declined'  => new static('Declined'),
                'Closed'    => new static('Closed'),
                'Completed' => new static('Completed')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function PENDING(): self
    {
        return static::values()['Pending'];
    }

    public static function OPEN(): self
    {
        return static::values()['Open'];
    }

    public static function DECLINED(): self
    {
        return static::values()['Declined'];
    }

    public static function CLOSED(): self
    {
        return static::values()['Closed'];
    }

    public static function COMPLETED(): self
    {
        return static::values()['Completed'];
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
