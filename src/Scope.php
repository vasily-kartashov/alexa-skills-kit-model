<?php

namespace Alexa\Model;

use JsonSerializable;

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
        return new class($constructor = function ($status) use ($instance): Scope {
            $instance->status = $status;
            return $instance;
        }) extends ScopeBuilder {};
    }

    /**
     * @param PermissionStatus $status
     * @return self
     */
    public static function ofStatus(PermissionStatus $status): Scope
    {
        $instance = new self;
        $instance->status = $status;
        return $instance;
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
