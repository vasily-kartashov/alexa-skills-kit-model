<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

use JsonSerializable;

final class Event implements JsonSerializable
{
    /** @var Header|null */
    private $header = null;

    /** @var mixed|null */
    private $payload = null;

    /** @var Endpoint|null */
    private $endpoint = null;

    protected function __construct()
    {
    }

    /**
     * @return Header|null
     */
    public function header()
    {
        return $this->header;
    }

    /**
     * @return mixed|null
     */
    public function payload()
    {
        return $this->payload;
    }

    /**
     * @return Endpoint|null
     */
    public function endpoint()
    {
        return $this->endpoint;
    }

    public static function builder(): EventBuilder
    {
        $instance = new self;
        return new class($constructor = function ($header, $payload, $endpoint) use ($instance): Event {
            $instance->header = $header;
            $instance->payload = $payload;
            $instance->endpoint = $endpoint;
            return $instance;
        }) extends EventBuilder {};
    }

    /**
     * @param Header $header
     * @return self
     */
    public static function ofHeader(Header $header): Event
    {
        $instance = new self;
        $instance->header = $header;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->header = isset($data['header']) ? Header::fromValue($data['header']) : null;
        $instance->payload = $data['payload'];
        $instance->endpoint = isset($data['endpoint']) ? Endpoint::fromValue($data['endpoint']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'header' => $this->header,
            'payload' => $this->payload,
            'endpoint' => $this->endpoint
        ]);
    }
}
