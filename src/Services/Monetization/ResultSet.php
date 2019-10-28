<?php

namespace Alexa\Model\Services\Monetization;

use \JsonSerializable;

final class ResultSet implements JsonSerializable
{
    /** @var string|null */
    private $nextToken = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function nextToken()
    {
        return $this->nextToken;
    }

    public static function builder(): ResultSetBuilder
    {
        $instance = new self;
        $constructor = function ($nextToken) use ($instance): ResultSet {
            $instance->nextToken = $nextToken;
            return $instance;
        };
        return new class($constructor) extends ResultSetBuilder
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
        $instance = new self;
        $instance->nextToken = isset($data['nextToken']) ? ((string) $data['nextToken']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'nextToken' => $this->nextToken
        ]);
    }
}
