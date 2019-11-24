<?php

namespace Alexa\Model\SLU\EntityResolution;

use JsonSerializable;

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
        return new class($constructor = function ($code) use ($instance): Status {
            $instance->code = $code;
            return $instance;
        }) extends StatusBuilder {};
    }

    /**
     * @param StatusCode $code
     * @return self
     */
    public static function ofCode(StatusCode $code): Status
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
