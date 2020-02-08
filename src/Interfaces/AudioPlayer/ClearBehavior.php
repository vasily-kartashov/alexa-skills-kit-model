<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use JsonSerializable;

final class ClearBehavior implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'CLEAR_ALL'      => new static('CLEAR_ALL'),
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
        return static::values()['CLEAR_ALL'];
    }

    public static function CLEAR_ENQUEUED(): self
    {
        return static::values()['CLEAR_ENQUEUED'];
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
