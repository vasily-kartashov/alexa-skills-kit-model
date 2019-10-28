<?php

namespace Alexa\Model\Services\EndpointEnumeration;

use \JsonSerializable;

final class Error implements JsonSerializable
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

    public static function builder(): ErrorBuilder
    {
        $instance = new self();
        $constructor = function ($code, $message) use ($instance): Error {
            $instance->code = $code;
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
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self();
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
