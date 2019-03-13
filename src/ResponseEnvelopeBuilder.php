<?php

namespace Alexa\Model;

abstract class ResponseEnvelopeBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $version = null;

    /** @var array */
    private $sessionAttributes = [];

    /** @var string|null */
    private $userAgent = null;

    /** @var Response|null */
    private $response = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
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

    /**
     * @param array $sessionAttributes
     * @return self
     */
    public function withSessionAttributes(array $sessionAttributes): self
    {
        $this->sessionAttributes = $sessionAttributes;
        return $this;
    }

    /**
     * @param string $userAgent
     * @return self
     */
    public function withUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * @param Response $response
     * @return self
     */
    public function withResponse(Response $response): self
    {
        $this->response = $response;
        return $this;
    }

    public function build(): ResponseEnvelope
    {
        return ($this->constructor)(
            $this->version,
            $this->sessionAttributes,
            $this->userAgent,
            $this->response
        );
    }
}
