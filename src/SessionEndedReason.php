<?php

namespace Alexa\Model;

use \JsonSerializable;

final class SessionEndedReason implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'USER_INITIATED' => new static('USER_INITIATED'),
                'ERROR' => new static('ERROR'),
                'EXCEEDED_MAX_REPROMPTS' => new static('EXCEEDED_MAX_REPROMPTS'),
                'null' => new static('null')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function USER_INITIATED(): self
    {
        return static::instances()['USER_INITIATED'];
    }

    public static function ERROR(): self
    {
        return static::instances()['ERROR'];
    }

    public static function EXCEEDED_MAX_REPROMPTS(): self
    {
        return static::instances()['EXCEEDED_MAX_REPROMPTS'];
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
