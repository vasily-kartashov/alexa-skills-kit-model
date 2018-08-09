<?php

namespace Alexa\Model\Interfaces\Display;

use \JsonSerializable;
use \RuntimeException;

final class BackButtonBehavior implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'HIDDEN' => new static('HIDDEN'),
                'VISIBLE' => new static('VISIBLE')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function HIDDEN(): self
    {
        return static::instances()['HIDDEN'];
    }

    public static function VISIBLE(): self
    {
        return static::instances()['VISIBLE'];
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
