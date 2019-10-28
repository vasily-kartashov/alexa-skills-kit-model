<?php

namespace Alexa\Model\Services\Monetization;

use \JsonSerializable;

final class Error implements JsonSerializable
{
    /** @var string|null */
    private $message = null;

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

    public static function builder(): ErrorBuilder
    {
        $instance = new self;
        $constructor = function ($message) use ($instance): Error {
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
     * @param string $message
     * @return self
     */
    public static function ofMessage(string $message): Error
    {
        $instance = new self;
        $instance->message = $message;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->message = isset($data['message']) ? ((string) $data['message']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'message' => $this->message
        ]);
    }
}
