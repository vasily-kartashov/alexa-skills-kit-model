<?php

namespace Alexa\Model;

use \JsonSerializable;

final class Scope implements JsonSerializable
{
    /** @var PermissionStatus|null */
    private $status = null;

    protected function __construct()
    {
    }

    /**
     * @return PermissionStatus|null
     */
    public function status()
    {
        return $this->status;
    }

    public static function builder(): ScopeBuilder
    {
        $instance = new self;
        $constructor = function ($status) use ($instance): Scope {
            $instance->status = $status;
            return $instance;
        };
        return new class($constructor) extends ScopeBuilder
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
        $instance->status = isset($data['status']) ? PermissionStatus::fromValue($data['status']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'status' => $this->status
        ]);
    }
}
