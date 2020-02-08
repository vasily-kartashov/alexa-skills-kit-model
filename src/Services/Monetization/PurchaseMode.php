<?php

namespace Alexa\Model\Services\Monetization;

use JsonSerializable;

final class PurchaseMode implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'TEST' => new static('TEST'),
                'LIVE' => new static('LIVE')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function TEST(): self
    {
        return static::values()['TEST'];
    }

    public static function LIVE(): self
    {
        return static::values()['LIVE'];
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
