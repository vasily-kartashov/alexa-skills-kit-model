<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use \JsonSerializable;
use \RuntimeException;

final class ClearBehavior implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'CLEAR_ALL' => new static('CLEAR_ALL'),
                'CLEAR_ENQUEUED' => new static('CLEAR_ENQUEUED')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function CLEAR_ALL(): self
    {
        return static::instances()['CLEAR_ALL'];
    }

    public static function CLEAR_ENQUEUED(): self
    {
        return static::instances()['CLEAR_ENQUEUED'];
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
