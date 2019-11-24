<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class MediaCommandType implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'play' => new static('play'),
                'pause' => new static('pause'),
                'next' => new static('next'),
                'previous' => new static('previous'),
                'rewind' => new static('rewind'),
                'seek' => new static('seek'),
                'setTrack' => new static('setTrack'),
                'null' => new static('null')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function PLAY(): self
    {
        return static::instances()['play'];
    }

    public static function PAUSE(): self
    {
        return static::instances()['pause'];
    }

    public static function NEXT(): self
    {
        return static::instances()['next'];
    }

    public static function PREVIOUS(): self
    {
        return static::instances()['previous'];
    }

    public static function REWIND(): self
    {
        return static::instances()['rewind'];
    }

    public static function SEEK(): self
    {
        return static::instances()['seek'];
    }

    public static function SET_TRACK(): self
    {
        return static::instances()['setTrack'];
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
