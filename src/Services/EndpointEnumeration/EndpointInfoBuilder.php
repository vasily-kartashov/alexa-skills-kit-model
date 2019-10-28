<?php

namespace Alexa\Model\Services\EndpointEnumeration;

abstract class EndpointInfoBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $endpointId = null;

    /** @var string|null */
    private $friendlyName = null;

    /** @var EndpointCapability[] */
    private $capabilities = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $endpointId
     * @return self
     */
    public function withEndpointId(string $endpointId): self
    {
        $this->endpointId = $endpointId;
        return $this;
    }

    /**
     * @param string $friendlyName
     * @return self
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $this->friendlyName = $friendlyName;
        return $this;
    }

    /**
     * @param array $capabilities
     * @return self
     */
    public function withCapabilities(array $capabilities): self
    {
        foreach ($capabilities as $element) {
            assert($element instanceof EndpointCapability);
        }
        $this->capabilities = $capabilities;
        return $this;
    }

    public function build(): EndpointInfo
    {
        return ($this->constructor)(
            $this->endpointId,
            $this->friendlyName,
            $this->capabilities
        );
    }
}
