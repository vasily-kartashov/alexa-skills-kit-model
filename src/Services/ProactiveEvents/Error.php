<?php

namespace Alexa\Model\Services\ProactiveEvents;

use JsonSerializable;

final class Error implements JsonSerializable
{
    /** @var int|null */
    private $code = null;

    /** @var string|null */
    private $message = null;

    protected function __construct()
    {
    }

    /**
     * @return int|null
     */
    public function code()
    {
        return $this->code;
    }

    /**
     * @return string|null
     */
    public function message()
    {
        return $this->message;
    }

    public static function builder(): ErrorBuilder
    {
        $instance = new self;
        return new class($constructor = function ($code, $message) use ($instance): Error {
            $instance->code = $code;
            $instance->message = $message;
            return $instance;
        }) extends ErrorBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->code = isset($data['code']) ? ((int) $data['code']) : null;
        $instance->message = isset($data['message']) ? ((string) $data['message']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'code' => $this->code,
            'message' => $this->message
        ]);
    }
}
