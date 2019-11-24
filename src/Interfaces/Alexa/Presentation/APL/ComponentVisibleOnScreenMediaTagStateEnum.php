<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class ComponentVisibleOnScreenMediaTagStateEnum implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'idle' => new static('idle'),
                'playing' => new static('playing'),
                'paused' => new static('paused'),
                'null' => new static('null')
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
        return static::instances()['idle'];
    }

    public static function PLAYING(): self
    {
        return static::instances()['playing'];
    }

    public static function PAUSED(): self
    {
        return static::instances()['paused'];
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
