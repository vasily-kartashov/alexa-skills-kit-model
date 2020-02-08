<?php

namespace Alexa\Model\Services\GameEngine;

use JsonSerializable;

final class EventReportingType implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'history' => new static('history'),
                'matches' => new static('matches')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function HISTORY(): self
    {
        return static::values()['history'];
    }

    public static function MATCHES(): self
    {
        return static::values()['matches'];
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
