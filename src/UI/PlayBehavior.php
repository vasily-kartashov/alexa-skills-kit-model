<?php

namespace Alexa\Model\UI;

use JsonSerializable;

final class PlayBehavior implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'ENQUEUE'          => new static('ENQUEUE'),
                'REPLACE_ALL'      => new static('REPLACE_ALL'),
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
        return static::values()['ENQUEUE'];
    }

    public static function REPLACE_ALL(): self
    {
        return static::values()['REPLACE_ALL'];
    }

    public static function REPLACE_ENQUEUED(): self
    {
        return static::values()['REPLACE_ENQUEUED'];
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
