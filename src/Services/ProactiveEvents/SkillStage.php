<?php

namespace Alexa\Model\Services\ProactiveEvents;

use \JsonSerializable;

final class SkillStage implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'DEVELOPMENT' => new static('DEVELOPMENT'),
                'LIVE' => new static('LIVE')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function DEVELOPMENT(): self
    {
        return static::instances()['DEVELOPMENT'];
    }

    public static function LIVE(): self
    {
        return static::instances()['LIVE'];
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
