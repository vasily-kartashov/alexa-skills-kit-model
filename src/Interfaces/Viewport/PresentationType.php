<?php

namespace Alexa\Model\Interfaces\Viewport;

use JsonSerializable;

final class PresentationType implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'STANDARD' => new static('STANDARD'),
                'OVERLAY'  => new static('OVERLAY')
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
        return static::values()['STANDARD'];
    }

    public static function OVERLAY(): self
    {
        return static::values()['OVERLAY'];
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
