<?php

namespace Alexa\Model\Interfaces\Geolocation;

use \JsonSerializable;

final class Status implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'RUNNING' => new static('RUNNING'),
                'STOPPED' => new static('STOPPED')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function RUNNING(): self
    {
        return static::instances()['RUNNING'];
    }

    public static function STOPPED(): self
    {
        return static::instances()['STOPPED'];
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
