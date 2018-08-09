<?php

namespace Alexa\Model\Services\ListManagement;

use \JsonSerializable;

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
        $instance = new self();
        $constructor = function ($message) use ($instance): ForbiddenError {
            $instance->message = $message;
            return $instance;
        };
        return new class($constructor) extends ForbiddenErrorBuilder
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
