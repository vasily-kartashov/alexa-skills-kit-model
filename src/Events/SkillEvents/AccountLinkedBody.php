<?php

namespace Alexa\Model\Events\SkillEvents;

use \JsonSerializable;

final class AccountLinkedBody implements JsonSerializable
{
    /** @var string|null */
    private $accessToken = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function accessToken()
    {
        return $this->accessToken;
    }

    public static function builder(): AccountLinkedBodyBuilder
    {
        $instance = new self();
        $constructor = function ($accessToken) use ($instance): AccountLinkedBody {
            $instance->accessToken = $accessToken;
            return $instance;
        };
        return new class($constructor) extends AccountLinkedBodyBuilder
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
        $instance->accessToken = isset($data['accessToken']) ? ((string) $data['accessToken']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'accessToken' => $this->accessToken
        ]);
    }
}
