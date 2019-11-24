<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

abstract class StartRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var StartRequestMethod|null */
    private $method = null;

    /** @var string|null */
    private $uri = null;

    /** @var mixed|null */
    private $headers = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param StartRequestMethod $method
     * @return self
     */
    public function withMethod(StartRequestMethod $method): self
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @param string $uri
     * @return self
     */
    public function withUri(string $uri): self
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @param mixed $headers
     * @return self
     */
    public function withHeaders($headers): self
    {
        $this->headers = $headers;
        return $this;
    }

    public function build(): StartRequest
    {
        return ($this->constructor)(
            $this->method,
            $this->uri,
            $this->headers
        );
    }
}
