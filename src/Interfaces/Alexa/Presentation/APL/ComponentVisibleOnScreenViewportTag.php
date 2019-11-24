<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class ComponentVisibleOnScreenViewportTag implements JsonSerializable
{
    protected function __construct()
    {
    }

    public static function empty(): ComponentVisibleOnScreenViewportTag
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
