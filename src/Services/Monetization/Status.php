<?php

namespace Alexa\Model\Services\Monetization;

use JsonSerializable;

final class Status implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'PENDING_APPROVAL_BY_PARENT'  => new static('PENDING_APPROVAL_BY_PARENT'),
                'APPROVED_BY_PARENT'          => new static('APPROVED_BY_PARENT'),
                'DENIED_BY_PARENT'            => new static('DENIED_BY_PARENT'),
                'EXPIRED_NO_ACTION_BY_PARENT' => new static('EXPIRED_NO_ACTION_BY_PARENT'),
                'ERROR'                       => new static('ERROR')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function PENDING_APPROVAL_BY_PARENT(): self
    {
        return static::values()['PENDING_APPROVAL_BY_PARENT'];
    }

    public static function APPROVED_BY_PARENT(): self
    {
        return static::values()['APPROVED_BY_PARENT'];
    }

    public static function DENIED_BY_PARENT(): self
    {
        return static::values()['DENIED_BY_PARENT'];
    }

    public static function EXPIRED_NO_ACTION_BY_PARENT(): self
    {
        return static::values()['EXPIRED_NO_ACTION_BY_PARENT'];
    }

    public static function ERROR(): self
    {
        return static::values()['ERROR'];
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
