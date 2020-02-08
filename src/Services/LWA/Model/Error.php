<?php

namespace Alexa\Model\Services\LWA\Model;

use JsonSerializable;

final class Error implements JsonSerializable
{
    /** @var string|null */
    private $error = null;

    /** @var string|null */
    private $error_description = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function error()
    {
        return $this->error;
    }

    /**
     * @return string|null
     */
    public function error_description()
    {
        return $this->error_description;
    }

    public static function builder(): ErrorBuilder
    {
        $instance = new self;
        return new class($constructor = function ($error, $error_description) use ($instance): Error {
            $instance->error = $error;
            $instance->error_description = $error_description;
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
        $instance->error = isset($data['error']) ? ((string) $data['error']) : null;
        $instance->error_description = isset($data['error_description']) ? ((string) $data['error_description']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'error' => $this->error,
            'error_description' => $this->error_description
        ]);
    }
}
