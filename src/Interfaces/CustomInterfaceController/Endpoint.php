<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

use \JsonSerializable;

final class Endpoint implements JsonSerializable
{
    /** @var string|null */
    private $endpointId = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function endpointId()
    {
        return $this->endpointId;
    }

    public static function builder(): EndpointBuilder
    {
        $instance = new self;
        $constructor = function ($endpointId) use ($instance): Endpoint {
            $instance->endpointId = $endpointId;
            return $instance;
        };
        return new class($constructor) extends EndpointBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param string $endpointId
     * @return self
     */
    public static function ofEndpointId(string $endpointId): Endpoint
    {
        $instance = new self;
        $instance->endpointId = $endpointId;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->endpointId = isset($data['endpointId']) ? ((string) $data['endpointId']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'endpointId' => $this->endpointId
        ]);
    }
}
