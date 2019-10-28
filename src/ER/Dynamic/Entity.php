<?php

namespace Alexa\Model\ER\Dynamic;

use \JsonSerializable;

final class Entity implements JsonSerializable
{
    /** @var string|null */
    private $id = null;

    /** @var EntityValueAndSynonyms|null */
    private $name = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return EntityValueAndSynonyms|null
     */
    public function name()
    {
        return $this->name;
    }

    public static function builder(): EntityBuilder
    {
        $instance = new self;
        $constructor = function ($id, $name) use ($instance): Entity {
            $instance->id = $id;
            $instance->name = $name;
            return $instance;
        };
        return new class($constructor) extends EntityBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param string $id
     * @return self
     */
    public static function ofId(string $id): Entity
    {
        $instance = new self;
        $instance->id = $id;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->id = isset($data['id']) ? ((string) $data['id']) : null;
        $instance->name = isset($data['name']) ? EntityValueAndSynonyms::fromValue($data['name']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'id' => $this->id,
            'name' => $this->name
        ]);
    }
}
