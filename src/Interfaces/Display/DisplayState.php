<?php

namespace Alexa\Model\Interfaces\Display;

use JsonSerializable;

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
        $instance = new self;
        return new class($constructor = function ($token) use ($instance): DisplayState {
            $instance->token = $token;
            return $instance;
        }) extends DisplayStateBuilder {};
    }

    /**
     * @param string $token
     * @return self
     */
    public static function ofToken(string $token): DisplayState
    {
        $instance = new self;
        $instance->token = $token;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
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
