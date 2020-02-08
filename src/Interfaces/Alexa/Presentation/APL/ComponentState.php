<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class ComponentState implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'checked'  => new static('checked'),
                'disabled' => new static('disabled'),
                'focused'  => new static('focused')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function CHECKED(): self
    {
        return static::values()['checked'];
    }

    public static function DISABLED(): self
    {
        return static::values()['disabled'];
    }

    public static function FOCUSED(): self
    {
        return static::values()['focused'];
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
