<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use \JsonSerializable;

final class AudioPlayerInterface implements JsonSerializable
{
    protected function __construct()
    {
    }

    public static function builder(): AudioPlayerInterfaceBuilder
    {
        $instance = new self();
        $constructor = function () use ($instance): AudioPlayerInterface {
            return $instance;
        };
        return new class($constructor) extends AudioPlayerInterfaceBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    public static function fromValue(array $data)
    {
        $instance = new self();
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            
        ]);
    }
}
