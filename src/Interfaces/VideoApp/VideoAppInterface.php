<?php

namespace Alexa\Model\Interfaces\VideoApp;

use JsonSerializable;

final class VideoAppInterface implements JsonSerializable
{
    protected function __construct()
    {
    }

    public static function empty(): VideoAppInterface
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
