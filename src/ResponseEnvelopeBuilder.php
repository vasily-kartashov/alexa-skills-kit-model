<?php

namespace Alexa\Model;

abstract class ResponseEnvelopeBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $version = null;

    /** @var null[] */
    private $sessionAttributes = [];

    /** @var string|null */
    private $userAgent = null;

    /** @var Response|null */
    private $response = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withVersion(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @param null[] $sessionAttributes
     * @return self
     */
    public function withSessionAttributes(array $sessionAttributes): self
    {
        $this->sessionAttributes = $sessionAttributes;
        return $this;
    }

    public function withUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;
        return $this;
    }

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
