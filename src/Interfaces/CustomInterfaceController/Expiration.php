<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

use \JsonSerializable;

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
        $constructor = function ($durationInMilliseconds, $expirationPayload) use ($instance): Expiration {
            $instance->durationInMilliseconds = $durationInMilliseconds;
            $instance->expirationPayload = $expirationPayload;
            return $instance;
        };
        return new class($constructor) extends ExpirationBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param int $durationInMilliseconds
     * @return self
     */
    public static function ofDurationInMilliseconds(int $durationInMilliseconds): Expiration
    {
        $instance = new self;
        $instance->durationInMilliseconds = $durationInMilliseconds;
        return $instance;
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
