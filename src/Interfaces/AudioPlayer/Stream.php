<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use JsonSerializable;

final class Stream implements JsonSerializable
{
    /** @var string|null */
    private $expectedPreviousToken = null;

    /** @var string|null */
    private $token = null;

    /** @var string|null */
    private $url = null;

    /** @var int|null */
    private $offsetInMilliseconds = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function expectedPreviousToken()
    {
        return $this->expectedPreviousToken;
    }

    /**
     * @return string|null
     */
    public function token()
    {
        return $this->token;
    }

    /**
     * @return string|null
     */
    public function url()
    {
        return $this->url;
    }

    /**
     * @return int|null
     */
    public function offsetInMilliseconds()
    {
        return $this->offsetInMilliseconds;
    }

    public static function builder(): StreamBuilder
    {
        $instance = new self;
        return new class($constructor = function ($expectedPreviousToken, $token, $url, $offsetInMilliseconds) use ($instance): Stream {
            $instance->expectedPreviousToken = $expectedPreviousToken;
            $instance->token = $token;
            $instance->url = $url;
            $instance->offsetInMilliseconds = $offsetInMilliseconds;
            return $instance;
        }) extends StreamBuilder {};
    }

    /**
     * @param string $expectedPreviousToken
     * @return self
     */
    public static function ofExpectedPreviousToken(string $expectedPreviousToken): Stream
    {
        $instance = new self;
        $instance->expectedPreviousToken = $expectedPreviousToken;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->expectedPreviousToken = isset($data['expectedPreviousToken']) ? ((string) $data['expectedPreviousToken']) : null;
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        $instance->url = isset($data['url']) ? ((string) $data['url']) : null;
        $instance->offsetInMilliseconds = isset($data['offsetInMilliseconds']) ? ((int) $data['offsetInMilliseconds']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'expectedPreviousToken' => $this->expectedPreviousToken,
            'token' => $this->token,
            'url' => $this->url,
            'offsetInMilliseconds' => $this->offsetInMilliseconds
        ]);
    }
}
