<?php

namespace Alexa\Model\Services\ProactiveEvents;

use JsonSerializable;

final class Event implements JsonSerializable
{
    /** @var string|null */
    private $name = null;

    /** @var mixed|null */
    private $payload = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return mixed|null
     */
    public function payload()
    {
        return $this->payload;
    }

    public static function builder(): EventBuilder
    {
        $instance = new self;
        return new class($constructor = function ($name, $payload) use ($instance): Event {
            $instance->name = $name;
            $instance->payload = $payload;
            return $instance;
        }) extends EventBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->name = isset($data['name']) ? ((string) $data['name']) : null;
        $instance->payload = $data['payload'];
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'payload' => $this->payload
        ]);
    }
}
