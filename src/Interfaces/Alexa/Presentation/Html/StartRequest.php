<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

use JsonSerializable;

final class StartRequest implements JsonSerializable
{
    /** @var StartRequestMethod|null */
    private $method = null;

    /** @var string|null */
    private $uri = null;

    /** @var mixed|null */
    private $headers = null;

    protected function __construct()
    {
    }

    /**
     * @return StartRequestMethod|null
     */
    public function method()
    {
        return $this->method;
    }

    /**
     * @return string|null
     */
    public function uri()
    {
        return $this->uri;
    }

    /**
     * @return mixed|null
     */
    public function headers()
    {
        return $this->headers;
    }

    public static function builder(): StartRequestBuilder
    {
        $instance = new self;
        return new class($constructor = function ($method, $uri, $headers) use ($instance): StartRequest {
            $instance->method = $method;
            $instance->uri = $uri;
            $instance->headers = $headers;
            return $instance;
        }) extends StartRequestBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->method = isset($data['method']) ? StartRequestMethod::fromValue($data['method']) : null;
        $instance->uri = isset($data['uri']) ? ((string) $data['uri']) : null;
        $instance->headers = $data['headers'];
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'method' => $this->method,
            'uri' => $this->uri,
            'headers' => $this->headers
        ]);
    }
}
