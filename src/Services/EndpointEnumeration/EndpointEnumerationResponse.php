<?php

namespace Alexa\Model\Services\EndpointEnumeration;

use \JsonSerializable;

final class EndpointEnumerationResponse implements JsonSerializable
{
    /** @var EndpointInfo[] */
    private $endpoints = [];

    protected function __construct()
    {
    }

    /**
     * @return EndpointInfo[]
     */
    public function endpoints()
    {
        return $this->endpoints;
    }

    public static function builder(): EndpointEnumerationResponseBuilder
    {
        $instance = new self;
        $constructor = function ($endpoints) use ($instance): EndpointEnumerationResponse {
            $instance->endpoints = $endpoints;
            return $instance;
        };
        return new class($constructor) extends EndpointEnumerationResponseBuilder
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
        $instance->endpoints = [];
        if (isset($data['endpoints'])) {
            foreach ($data['endpoints'] as $item) {
                $element = isset($item) ? EndpointInfo::fromValue($item) : null;
                if ($element !== null) {
                    $instance->endpoints[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'endpoints' => $this->endpoints
        ]);
    }
}
