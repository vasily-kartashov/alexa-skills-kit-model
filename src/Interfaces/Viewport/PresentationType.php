<?php

namespace Alexa\Model\Interfaces\Viewport;

use \JsonSerializable;

final class PresentationType implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'STANDARD' => new static('STANDARD'),
                'OVERLAY' => new static('OVERLAY')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function STANDARD(): self
    {
        return static::instances()['STANDARD'];
    }

    public static function OVERLAY(): self
    {
        return static::instances()['OVERLAY'];
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
