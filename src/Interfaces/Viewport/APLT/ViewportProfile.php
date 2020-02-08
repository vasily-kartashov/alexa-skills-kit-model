<?php

namespace Alexa\Model\Interfaces\Viewport\APLT;

use JsonSerializable;

final class ViewportProfile implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'FOUR_CHARACTER_CLOCK' => new static('FOUR_CHARACTER_CLOCK')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function FOUR_CHARACTER_CLOCK(): self
    {
        return static::values()['FOUR_CHARACTER_CLOCK'];
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
