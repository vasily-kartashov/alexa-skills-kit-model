<?php

namespace Alexa\Model\Services\ListManagement;

use JsonSerializable;

final class UpdateListRequest implements JsonSerializable
{
    /** @var string|null */
    private $name = null;

    /** @var ListState|null */
    private $state = null;

    /** @var int|null */
    private $version = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return ListState|null
     */
    public function state()
    {
        return $this->state;
    }

    /**
     * @return int|null
     */
    public function version()
    {
        return $this->version;
    }

    public static function builder(): UpdateListRequestBuilder
    {
        $instance = new self;
        return new class($constructor = function ($name, $state, $version) use ($instance): UpdateListRequest {
            $instance->name = $name;
            $instance->state = $state;
            $instance->version = $version;
            return $instance;
        }) extends UpdateListRequestBuilder {};
    }

    /**
     * @param string $name
     * @return self
     */
    public static function ofName(string $name): UpdateListRequest
    {
        $instance = new self;
        $instance->name = $name;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->name = isset($data['name']) ? ((string) $data['name']) : null;
        $instance->state = isset($data['state']) ? ListState::fromValue($data['state']) : null;
        $instance->version = isset($data['version']) ? ((int) $data['version']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'state' => $this->state,
            'version' => $this->version
        ]);
    }
}
