<?php

namespace Alexa\Model\Interfaces\Viewport\APLT;

use JsonSerializable;

final class CharacterFormat implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'SEVEN_SEGMENT' => new static('SEVEN_SEGMENT')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function SEVEN_SEGMENT(): self
    {
        return static::values()['SEVEN_SEGMENT'];
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
