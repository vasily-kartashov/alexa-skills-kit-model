<?php

namespace Alexa\Model\Interfaces\Automotive;

use \JsonSerializable;

final class AutomotiveState implements JsonSerializable
{
    protected function __construct()
    {
    }

    public static function builder(): AutomotiveStateBuilder
    {
        $instance = new self();
        $constructor = function () use ($instance): AutomotiveState {
            return $instance;
        };
        return new class($constructor) extends AutomotiveStateBuilder
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
