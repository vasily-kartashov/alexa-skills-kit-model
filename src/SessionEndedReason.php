<?php

namespace Alexa\Model;

use JsonSerializable;

final class SessionEndedReason implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'USER_INITIATED'         => new static('USER_INITIATED'),
                'ERROR'                  => new static('ERROR'),
                'EXCEEDED_MAX_REPROMPTS' => new static('EXCEEDED_MAX_REPROMPTS')
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
        return static::values()['USER_INITIATED'];
    }

    public static function ERROR(): self
    {
        return static::values()['ERROR'];
    }

    public static function EXCEEDED_MAX_REPROMPTS(): self
    {
        return static::values()['EXCEEDED_MAX_REPROMPTS'];
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
