<?php

namespace Alexa\Model\Interfaces\Connections;

use JsonSerializable;

final class ConnectionsStatus implements JsonSerializable
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

    public static function builder(): ConnectionsStatusBuilder
    {
        $instance = new self;
        return new class($constructor = function ($code, $message) use ($instance): ConnectionsStatus {
            $instance->code = $code;
            $instance->message = $message;
            return $instance;
        }) extends ConnectionsStatusBuilder {};
    }

    /**
     * @param string $code
     * @return self
     */
    public static function ofCode(string $code): ConnectionsStatus
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
