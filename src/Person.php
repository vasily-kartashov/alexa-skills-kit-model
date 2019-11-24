<?php

namespace Alexa\Model;

use \JsonSerializable;

final class Person implements JsonSerializable
{
    /** @var string|null */
    private $personId = null;

    /** @var string|null */
    private $accessToken = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function personId()
    {
        return $this->personId;
    }

    /**
     * @return string|null
     */
    public function accessToken()
    {
        return $this->accessToken;
    }

    public static function builder(): PersonBuilder
    {
        $instance = new self;
        $constructor = function ($personId, $accessToken) use ($instance): Person {
            $instance->personId = $personId;
            $instance->accessToken = $accessToken;
            return $instance;
        };
        return new class($constructor) extends PersonBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param string $personId
     * @return self
     */
    public static function ofPersonId(string $personId): Person
    {
        $instance = new self;
        $instance->personId = $personId;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->personId = isset($data['personId']) ? ((string) $data['personId']) : null;
        $instance->accessToken = isset($data['accessToken']) ? ((string) $data['accessToken']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'personId' => $this->personId,
            'accessToken' => $this->accessToken
        ]);
    }
}
