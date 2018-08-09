<?php

namespace Alexa\Model\Interfaces\Display;

use \JsonSerializable;

final class DisplayState implements JsonSerializable
{
    /** @var string|null */
    private $token = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function token()
    {
        return $this->token;
    }

    public static function builder(): DisplayStateBuilder
    {
        $instance = new self();
        $constructor = function ($token) use ($instance): DisplayState {
            $instance->token = $token;
            return $instance;
        };
        return new class($constructor) extends DisplayStateBuilder
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
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'token' => $this->token
        ]);
    }
}
