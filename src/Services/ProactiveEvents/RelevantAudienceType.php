<?php

namespace Alexa\Model\Services\ProactiveEvents;

use \JsonSerializable;

final class RelevantAudienceType implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'Unicast' => new static('Unicast'),
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
        return static::instances()['Unicast'];
    }

    public static function MULTICAST(): self
    {
        return static::instances()['Multicast'];
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
