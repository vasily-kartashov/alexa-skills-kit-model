<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class ComponentVisibleOnScreenScrollableTagDirectionEnum implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'horizontal' => new static('horizontal'),
                'vertical'   => new static('vertical')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function HORIZONTAL(): self
    {
        return static::values()['horizontal'];
    }

    public static function VERTICAL(): self
    {
        return static::values()['vertical'];
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
