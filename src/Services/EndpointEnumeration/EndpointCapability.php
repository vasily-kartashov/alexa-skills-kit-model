<?php

namespace Alexa\Model\Services\EndpointEnumeration;

use \JsonSerializable;

final class EndpointCapability implements JsonSerializable
{
    /** @var string|null */
    private $interface = null;

    /** @var string|null */
    private $type = null;

    /** @var string|null */
    private $version = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function interface()
    {
        return $this->interface;
    }

    /**
     * @return string|null
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function version()
    {
        return $this->version;
    }

    public static function builder(): EndpointCapabilityBuilder
    {
        $instance = new self;
        $constructor = function ($interface, $type, $version) use ($instance): EndpointCapability {
            $instance->interface = $interface;
            $instance->type = $type;
            $instance->version = $version;
            return $instance;
        };
        return new class($constructor) extends EndpointCapabilityBuilder
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
        $instance->interface = isset($data['interface']) ? ((string) $data['interface']) : null;
        $instance->type = isset($data['type']) ? ((string) $data['type']) : null;
        $instance->version = isset($data['version']) ? ((string) $data['version']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'interface' => $this->interface,
            'type' => $this->type,
            'version' => $this->version
        ]);
    }
}
