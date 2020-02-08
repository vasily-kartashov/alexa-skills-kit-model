<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class ComponentVisibleOnScreenMediaTagStateEnum implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'idle'    => new static('idle'),
                'playing' => new static('playing'),
                'paused'  => new static('paused')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function IDLE(): self
    {
        return static::values()['idle'];
    }

    public static function PLAYING(): self
    {
        return static::values()['playing'];
    }

    public static function PAUSED(): self
    {
        return static::values()['paused'];
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
