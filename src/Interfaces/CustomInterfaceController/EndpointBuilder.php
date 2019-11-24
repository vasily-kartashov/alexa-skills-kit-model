<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

abstract class EndpointBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $endpointId = null;

    public function __construct(callable $constructor)
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

    public function build(): Endpoint
    {
        return ($this->constructor)(
            $this->endpointId
        );
    }
}
