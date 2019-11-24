<?php

namespace Alexa\Model\Services\EndpointEnumeration;

use JsonSerializable;

final class EndpointInfo implements JsonSerializable
{
    /** @var string|null */
    private $endpointId = null;

    /** @var string|null */
    private $friendlyName = null;

    /** @var EndpointCapability[] */
    private $capabilities = [];

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

    /**
     * @return string|null
     */
    public function friendlyName()
    {
        return $this->friendlyName;
    }

    /**
     * @return EndpointCapability[]
     */
    public function capabilities()
    {
        return $this->capabilities;
    }

    public static function builder(): EndpointInfoBuilder
    {
        $instance = new self;
        return new class($constructor = function ($endpointId, $friendlyName, $capabilities) use ($instance): EndpointInfo {
            $instance->endpointId = $endpointId;
            $instance->friendlyName = $friendlyName;
            $instance->capabilities = $capabilities;
            return $instance;
        }) extends EndpointInfoBuilder {};
    }

    /**
     * @param string $endpointId
     * @return self
     */
    public static function ofEndpointId(string $endpointId): EndpointInfo
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
        $instance->friendlyName = isset($data['friendlyName']) ? ((string) $data['friendlyName']) : null;
        $instance->capabilities = [];
        if (isset($data['capabilities'])) {
            foreach ($data['capabilities'] as $item) {
                $element = isset($item) ? EndpointCapability::fromValue($item) : null;
                if ($element !== null) {
                    $instance->capabilities[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'endpointId' => $this->endpointId,
            'friendlyName' => $this->friendlyName,
            'capabilities' => $this->capabilities
        ]);
    }
}
