<?php

namespace Alexa\Model\Interfaces\System;

use \JsonSerializable;

final class Error implements JsonSerializable
{
    /** @var ErrorType|null */
    private $type = null;

    /** @var string|null */
    private $message = null;

    protected function __construct()
    {
    }

    /**
     * @return ErrorType|null
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

    public static function builder(): ErrorBuilder
    {
        $instance = new self();
        $constructor = function ($type, $message) use ($instance): Error {
            $instance->type = $type;
            $instance->message = $message;
            return $instance;
        };
        return new class($constructor) extends ErrorBuilder
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
        $instance->type = isset($data['type']) ? ErrorType::fromValue($data['type']) : null;
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
