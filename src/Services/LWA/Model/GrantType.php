<?php

namespace Alexa\Model\Services\LWA\Model;

use JsonSerializable;

final class GrantType implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'CLIENT_CREDENTIALS' => new static('CLIENT_CREDENTIALS'),
                'REFRESH_TOKEN'      => new static('REFRESH_TOKEN')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function CLIENT_CREDENTIALS(): self
    {
        return static::values()['CLIENT_CREDENTIALS'];
    }

    public static function REFRESH_TOKEN(): self
    {
        return static::values()['REFRESH_TOKEN'];
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
