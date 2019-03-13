<?php

namespace Alexa\Model\Services\ProactiveEvents;

use \JsonSerializable;

final class RelevantAudience implements JsonSerializable
{
    /** @var RelevantAudienceType|null */
    private $type = null;

    /** @var mixed|null */
    private $payload = null;

    protected function __construct()
    {
    }

    /**
     * @return RelevantAudienceType|null
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return mixed|null
     */
    public function payload()
    {
        return $this->payload;
    }

    public static function builder(): RelevantAudienceBuilder
    {
        $instance = new self();
        $constructor = function ($type, $payload) use ($instance): RelevantAudience {
            $instance->type = $type;
            $instance->payload = $payload;
            return $instance;
        };
        return new class($constructor) extends RelevantAudienceBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->type = isset($data['type']) ? RelevantAudienceType::fromValue($data['type']) : null;
        $instance->payload = $data['payload'];
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => $this->type,
            'payload' => $this->payload
        ]);
    }
}
