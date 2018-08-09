<?php

namespace Alexa\Model\SLU\EntityResolution;

use \JsonSerializable;

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
        $instance = new self();
        $constructor = function ($name, $id) use ($instance): Value {
            $instance->name = $name;
            $instance->id = $id;
            return $instance;
        };
        return new class($constructor) extends ValueBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    public static function fromValue(array $data)
    {
        $instance = new self();
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
