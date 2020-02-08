<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use JsonSerializable;

final class Error implements JsonSerializable
{
    /** @var string|null */
    private $message = null;

    /** @var ErrorType|null */
    private $type = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * @return ErrorType|null
     */
    public function type()
    {
        return $this->type;
    }

    public static function builder(): ErrorBuilder
    {
        $instance = new self;
        return new class($constructor = function ($message, $type) use ($instance): Error {
            $instance->message = $message;
            $instance->type = $type;
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
        $instance->message = isset($data['message']) ? ((string) $data['message']) : null;
        $instance->type = isset($data['type']) ? ErrorType::fromValue($data['type']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'message' => $this->message,
            'type' => $this->type
        ]);
    }
}
