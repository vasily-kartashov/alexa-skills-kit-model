<?php

namespace Alexa\Model\Interfaces\Viewport\Video;

use \JsonSerializable;

final class Codecs implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'H_264_41' => new static('H_264_41'),
                'H_264_42' => new static('H_264_42')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function H_264_41(): self
    {
        return static::instances()['H_264_41'];
    }

    public static function H_264_42(): self
    {
        return static::instances()['H_264_42'];
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
