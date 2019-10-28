<?php

namespace Alexa\Model\SLU\EntityResolution;

use \JsonSerializable;

final class Status implements JsonSerializable
{
    /** @var StatusCode|null */
    private $code = null;

    protected function __construct()
    {
    }

    /**
     * @return StatusCode|null
     */
    public function code()
    {
        return $this->code;
    }

    public static function builder(): StatusBuilder
    {
        $instance = new self;
        $constructor = function ($code) use ($instance): Status {
            $instance->code = $code;
            return $instance;
        };
        return new class($constructor) extends StatusBuilder
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
        $instance = new self;
        $instance->code = isset($data['code']) ? StatusCode::fromValue($data['code']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'code' => $this->code
        ]);
    }
}
