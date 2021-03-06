<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

use JsonSerializable;

final class Expiration implements JsonSerializable
{
    /** @var int|null */
    private $durationInMilliseconds = null;

    /** @var mixed|null */
    private $expirationPayload = null;

    protected function __construct()
    {
    }

    /**
     * @return int|null
     */
    public function durationInMilliseconds()
    {
        return $this->durationInMilliseconds;
    }

    /**
     * @return mixed|null
     */
    public function expirationPayload()
    {
        return $this->expirationPayload;
    }

    public static function builder(): ExpirationBuilder
    {
        $instance = new self;
        return new class($constructor = function ($durationInMilliseconds, $expirationPayload) use ($instance): Expiration {
            $instance->durationInMilliseconds = $durationInMilliseconds;
            $instance->expirationPayload = $expirationPayload;
            return $instance;
        }) extends ExpirationBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->durationInMilliseconds = isset($data['durationInMilliseconds']) ? ((int) $data['durationInMilliseconds']) : null;
        $instance->expirationPayload = $data['expirationPayload'];
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'durationInMilliseconds' => $this->durationInMilliseconds,
            'expirationPayload' => $this->expirationPayload
        ]);
    }
}
