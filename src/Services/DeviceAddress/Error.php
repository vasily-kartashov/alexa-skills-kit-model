<?php

namespace Alexa\Model\Services\DeviceAddress;

use \JsonSerializable;

final class Error implements JsonSerializable
{
    /** @var string|null */
    private $type = null;

    /** @var string|null */
    private $message = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
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
        $instance = new self;
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

    /**
     * @param string $type
     * @return self
     */
    public static function ofType(string $type): Error
    {
        $instance = new self;
        $instance->type = $type;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = isset($data['type']) ? ((string) $data['type']) : null;
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
