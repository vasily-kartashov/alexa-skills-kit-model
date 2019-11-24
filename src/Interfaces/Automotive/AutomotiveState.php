<?php

namespace Alexa\Model\Interfaces\Automotive;

use JsonSerializable;

final class AutomotiveState implements JsonSerializable
{
    protected function __construct()
    {
    }

    public static function empty(): AutomotiveState
    {
        return new self;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            
        ]);
    }
}
