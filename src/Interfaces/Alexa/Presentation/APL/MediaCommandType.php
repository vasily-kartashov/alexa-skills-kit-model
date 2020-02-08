<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class MediaCommandType implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'play'     => new static('play'),
                'pause'    => new static('pause'),
                'next'     => new static('next'),
                'previous' => new static('previous'),
                'rewind'   => new static('rewind'),
                'seek'     => new static('seek'),
                'setTrack' => new static('setTrack')
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
        return static::values()['play'];
    }

    public static function PAUSE(): self
    {
        return static::values()['pause'];
    }

    public static function NEXT(): self
    {
        return static::values()['next'];
    }

    public static function PREVIOUS(): self
    {
        return static::values()['previous'];
    }

    public static function REWIND(): self
    {
        return static::values()['rewind'];
    }

    public static function SEEK(): self
    {
        return static::values()['seek'];
    }

    public static function SET_TRACK(): self
    {
        return static::values()['setTrack'];
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
