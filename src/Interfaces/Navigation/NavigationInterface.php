<?php

namespace Alexa\Model\Interfaces\Navigation;

use JsonSerializable;

final class NavigationInterface implements JsonSerializable
{
    protected function __construct()
    {
    }

    public static function empty(): NavigationInterface
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
