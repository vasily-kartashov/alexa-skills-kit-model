<?php

namespace Alexa\Model\Interfaces\AmazonPay\Model\V1;

use JsonSerializable;

final class State implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'Pending' => new static('Pending'),
                'Open' => new static('Open'),
                'Declined' => new static('Declined'),
                'Closed' => new static('Closed'),
                'Completed' => new static('Completed'),
                'null' => new static('null')
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
        return static::instances()['Pending'];
    }

    public static function OPEN(): self
    {
        return static::instances()['Open'];
    }

    public static function DECLINED(): self
    {
        return static::instances()['Declined'];
    }

    public static function CLOSED(): self
    {
        return static::instances()['Closed'];
    }

    public static function COMPLETED(): self
    {
        return static::instances()['Completed'];
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
