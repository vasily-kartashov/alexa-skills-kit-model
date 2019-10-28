<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

use \JsonSerializable;

final class TargetProfile implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'FOUR_CHARACTER_CLOCK' => new static('FOUR_CHARACTER_CLOCK'),
                'NONE' => new static('NONE')
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
        return static::instances()['FOUR_CHARACTER_CLOCK'];
    }

    public static function NONE(): self
    {
        return static::instances()['NONE'];
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
