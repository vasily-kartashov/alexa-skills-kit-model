<?php

namespace Alexa\Model;

use JsonSerializable;

final class RequestEnvelope implements JsonSerializable
{
    /** @var string|null */
    private $version = null;

    /** @var Session|null */
    private $session = null;

    /** @var Context|null */
    private $context = null;

    /** @var Request|null */
    private $request = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function version()
    {
        return $this->version;
    }

    /**
     * @return Session|null
     */
    public function session()
    {
        return $this->session;
    }

    /**
     * @return Context|null
     */
    public function context()
    {
        return $this->context;
    }

    /**
     * @return Request|null
     */
    public function request()
    {
        return $this->request;
    }

    public static function builder(): RequestEnvelopeBuilder
    {
        $instance = new self;
        return new class($constructor = function ($version, $session, $context, $request) use ($instance): RequestEnvelope {
            $instance->version = $version;
            $instance->session = $session;
            $instance->context = $context;
            $instance->request = $request;
            return $instance;
        }) extends RequestEnvelopeBuilder {};
    }

    /**
     * @param string $version
     * @return self
     */
    public static function ofVersion(string $version): RequestEnvelope
    {
        $instance = new self;
        $instance->version = $version;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->version = isset($data['version']) ? ((string) $data['version']) : null;
        $instance->session = isset($data['session']) ? Session::fromValue($data['session']) : null;
        $instance->context = isset($data['context']) ? Context::fromValue($data['context']) : null;
        $instance->request = isset($data['request']) ? Request::fromValue($data['request']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'version' => $this->version,
            'session' => $this->session,
            'context' => $this->context,
            'request' => $this->request
        ]);
    }
}
