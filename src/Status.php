<?php

namespace Alexa\Model;

use JsonSerializable;

final class Status implements JsonSerializable
{
    /** @var string|null */
    private $code = null;

    /** @var string|null */
    private $message = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
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

    public static function builder(): StatusBuilder
    {
        $instance = new self;
        return new class($constructor = function ($code, $message) use ($instance): Status {
            $instance->code = $code;
            $instance->message = $message;
            return $instance;
        }) extends StatusBuilder {};
    }

    /**
     * @param string $code
     * @return self
     */
    public static function ofCode(string $code): Status
    {
        $instance = new self;
        $instance->code = $code;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->code = isset($data['code']) ? ((string) $data['code']) : null;
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
