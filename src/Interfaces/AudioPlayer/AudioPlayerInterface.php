<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use JsonSerializable;

final class AudioPlayerInterface implements JsonSerializable
{
    protected function __construct()
    {
    }

    public static function empty(): AudioPlayerInterface
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
