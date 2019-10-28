<?php

namespace Alexa\Model\Services\Monetization;

use \JsonSerializable;

final class Metadata implements JsonSerializable
{
    /** @var ResultSet|null */
    private $resultSet = null;

    protected function __construct()
    {
    }

    /**
     * @return ResultSet|null
     */
    public function resultSet()
    {
        return $this->resultSet;
    }

    public static function builder(): MetadataBuilder
    {
        $instance = new self;
        $constructor = function ($resultSet) use ($instance): Metadata {
            $instance->resultSet = $resultSet;
            return $instance;
        };
        return new class($constructor) extends MetadataBuilder
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
        $instance->resultSet = isset($data['resultSet']) ? ResultSet::fromValue($data['resultSet']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'resultSet' => $this->resultSet
        ]);
    }
}
