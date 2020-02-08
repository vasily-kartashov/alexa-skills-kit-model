<?php

namespace Alexa\Model\Services\SkillMessaging;

use JsonSerializable;

final class SendSkillMessagingRequest implements JsonSerializable
{
    /** @var mixed|null */
    private $data = null;

    /** @var int|null */
    private $expiresAfterSeconds = null;

    protected function __construct()
    {
    }

    /**
     * @return mixed|null
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * @return int|null
     */
    public function expiresAfterSeconds()
    {
        return $this->expiresAfterSeconds;
    }

    public static function builder(): SendSkillMessagingRequestBuilder
    {
        $instance = new self;
        return new class($constructor = function ($data, $expiresAfterSeconds) use ($instance): SendSkillMessagingRequest {
            $instance->data = $data;
            $instance->expiresAfterSeconds = $expiresAfterSeconds;
            return $instance;
        }) extends SendSkillMessagingRequestBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->data = $data['data'];
        $instance->expiresAfterSeconds = isset($data['expiresAfterSeconds']) ? ((int) $data['expiresAfterSeconds']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'data' => $this->data,
            'expiresAfterSeconds' => $this->expiresAfterSeconds
        ]);
    }
}
