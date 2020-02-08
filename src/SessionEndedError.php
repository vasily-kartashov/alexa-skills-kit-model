<?php

namespace Alexa\Model;

use JsonSerializable;

final class SessionEndedError implements JsonSerializable
{
    /** @var SessionEndedErrorType|null */
    private $type = null;

    /** @var string|null */
    private $message = null;

    protected function __construct()
    {
    }

    /**
     * @return SessionEndedErrorType|null
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function message()
    {
        return $this->message;
    }

    public static function builder(): SessionEndedErrorBuilder
    {
        $instance = new self;
        return new class($constructor = function ($type, $message) use ($instance): SessionEndedError {
            $instance->type = $type;
            $instance->message = $message;
            return $instance;
        }) extends SessionEndedErrorBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = isset($data['type']) ? SessionEndedErrorType::fromValue($data['type']) : null;
        $instance->message = isset($data['message']) ? ((string) $data['message']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => $this->type,
            'message' => $this->message
        ]);
    }
}
