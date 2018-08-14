<?php

namespace Alexa\Model\Interfaces\VideoApp;

use \JsonSerializable;

final class VideoAppInterface implements JsonSerializable
{
    protected function __construct()
    {
    }

    public static function builder(): VideoAppInterfaceBuilder
    {
        $instance = new self();
        $constructor = function () use ($instance): VideoAppInterface {
            return $instance;
        };
        return new class($constructor) extends VideoAppInterfaceBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
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
