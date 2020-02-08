<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use JsonSerializable;

final class PlayerActivity implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'PLAYING'         => new static('PLAYING'),
                'PAUSED'          => new static('PAUSED'),
                'FINISHED'        => new static('FINISHED'),
                'BUFFER_UNDERRUN' => new static('BUFFER_UNDERRUN'),
                'IDLE'            => new static('IDLE'),
                'STOPPED'         => new static('STOPPED')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function PLAYING(): self
    {
        return static::values()['PLAYING'];
    }

    public static function PAUSED(): self
    {
        return static::values()['PAUSED'];
    }

    public static function FINISHED(): self
    {
        return static::values()['FINISHED'];
    }

    public static function BUFFER_UNDERRUN(): self
    {
        return static::values()['BUFFER_UNDERRUN'];
    }

    public static function IDLE(): self
    {
        return static::values()['IDLE'];
    }

    public static function STOPPED(): self
    {
        return static::values()['STOPPED'];
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
