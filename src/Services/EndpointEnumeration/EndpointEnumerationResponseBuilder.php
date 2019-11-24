<?php

namespace Alexa\Model\Services\EndpointEnumeration;

abstract class EndpointEnumerationResponseBuilder
{
    /** @var callable */
    private $constructor;

    /** @var EndpointInfo[] */
    private $endpoints = [];

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $endpoints
     * @return self
     */
    public function withEndpoints(array $endpoints): self
    {
        foreach ($endpoints as $element) {
            assert($element instanceof EndpointInfo);
        }
        $this->endpoints = $endpoints;
        return $this;
    }

    public function build(): EndpointEnumerationResponse
    {
        return ($this->constructor)(
            $this->endpoints
        );
    }
}
