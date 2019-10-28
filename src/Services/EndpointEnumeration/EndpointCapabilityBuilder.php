<?php

namespace Alexa\Model\Services\EndpointEnumeration;

abstract class EndpointCapabilityBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $interface = null;

    /** @var string|null */
    private $type = null;

    /** @var string|null */
    private $version = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $interface
     * @return self
     */
    public function withInterface(string $interface): self
    {
        $this->interface = $interface;
        return $this;
    }

    /**
     * @param string $type
     * @return self
     */
    public function withType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $version
     * @return self
     */
    public function withVersion(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    public function build(): EndpointCapability
    {
        return ($this->constructor)(
            $this->interface,
            $this->type,
            $this->version
        );
    }
}
