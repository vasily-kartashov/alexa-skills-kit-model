<?php

namespace Alexa\Model\Interfaces\System;

use \JsonSerializable;

final class ErrorCause implements JsonSerializable
{
    /** @var string|null */
    private $requestId = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function requestId()
    {
        return $this->requestId;
    }

    public static function builder(): ErrorCauseBuilder
    {
        $instance = new self();
        $constructor = function ($requestId) use ($instance): ErrorCause {
            $instance->requestId = $requestId;
            return $instance;
        };
        return new class($constructor) extends ErrorCauseBuilder
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
        $instance->requestId = isset($data['requestId']) ? ((string) $data['requestId']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'requestId' => $this->requestId
        ]);
    }
}
