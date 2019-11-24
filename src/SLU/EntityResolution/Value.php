<?php

namespace Alexa\Model\SLU\EntityResolution;

use JsonSerializable;

final class Value implements JsonSerializable
{
    /** @var string|null */
    private $name = null;

    /** @var string|null */
    private $id = null;

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
     * @return string|null
     */
    public function id()
    {
        return $this->id;
    }

    public static function builder(): ValueBuilder
    {
        $instance = new self;
        return new class($constructor = function ($name, $id) use ($instance): Value {
            $instance->name = $name;
            $instance->id = $id;
            return $instance;
        }) extends ValueBuilder {};
    }

    /**
     * @param string $name
     * @return self
     */
    public static function ofName(string $name): Value
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
        $instance->id = isset($data['id']) ? ((string) $data['id']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'id' => $this->id
        ]);
    }
}
