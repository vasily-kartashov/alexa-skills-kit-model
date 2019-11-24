<?php

namespace Alexa\Model\Services\ListManagement;

use JsonSerializable;

final class ForbiddenError implements JsonSerializable
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

    public static function builder(): ForbiddenErrorBuilder
    {
        $instance = new self;
        return new class($constructor = function ($message) use ($instance): ForbiddenError {
            $instance->message = $message;
            return $instance;
        }) extends ForbiddenErrorBuilder {};
    }

    /**
     * @param string $message
     * @return self
     */
    public static function ofMessage(string $message): ForbiddenError
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
        $instance->message = isset($data['Message']) ? ((string) $data['Message']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'Message' => $this->message
        ]);
    }
}
