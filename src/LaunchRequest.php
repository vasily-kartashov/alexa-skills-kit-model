<?php

namespace Alexa\Model;

use \JsonSerializable;

final class LaunchRequest extends Request implements JsonSerializable
{
    const TYPE = 'LaunchRequest';

    protected function __construct()
    {
        parent::__construct();
    }

    public static function builder(): LaunchRequestBuilder
    {
        $instance = new self();
        $constructor = function () use ($instance): LaunchRequest {
            return $instance;
        };
        return new class($constructor) extends LaunchRequestBuilder
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
        $instance->type = self::TYPE;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE
        ]);
    }
}
