<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

use \JsonSerializable;

final class FilterMatchAction implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'SEND_AND_TERMINATE' => new static('SEND_AND_TERMINATE'),
                'SEND' => new static('SEND')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function SEND_AND_TERMINATE(): self
    {
        return static::instances()['SEND_AND_TERMINATE'];
    }

    public static function SEND(): self
    {
        return static::instances()['SEND'];
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
