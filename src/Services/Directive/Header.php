<?php

namespace Alexa\Model\Services\Directive;

use \JsonSerializable;

final class Header implements JsonSerializable
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

    public static function builder(): HeaderBuilder
    {
        $instance = new self;
        $constructor = function ($requestId) use ($instance): Header {
            $instance->requestId = $requestId;
            return $instance;
        };
        return new class($constructor) extends HeaderBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param string $requestId
     * @return self
     */
    public static function ofRequestId(string $requestId): Header
    {
        $instance = new self;
        $instance->requestId = $requestId;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
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
