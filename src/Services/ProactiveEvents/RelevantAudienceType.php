<?php

namespace Alexa\Model\Services\ProactiveEvents;

use JsonSerializable;

final class RelevantAudienceType implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'Unicast'   => new static('Unicast'),
                'Multicast' => new static('Multicast')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function UNICAST(): self
    {
        return static::values()['Unicast'];
    }

    public static function MULTICAST(): self
    {
        return static::values()['Multicast'];
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
