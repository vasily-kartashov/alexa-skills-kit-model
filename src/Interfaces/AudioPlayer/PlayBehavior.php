<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use \JsonSerializable;

final class PlayBehavior implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'ENQUEUE' => new static('ENQUEUE'),
                'REPLACE_ALL' => new static('REPLACE_ALL'),
                'REPLACE_ENQUEUED' => new static('REPLACE_ENQUEUED')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function ENQUEUE(): self
    {
        return static::instances()['ENQUEUE'];
    }

    public static function REPLACE_ALL(): self
    {
        return static::instances()['REPLACE_ALL'];
    }

    public static function REPLACE_ENQUEUED(): self
    {
        return static::instances()['REPLACE_ENQUEUED'];
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
