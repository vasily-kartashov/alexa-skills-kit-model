<?php

namespace Alexa\Model\ER\Dynamic;

use JsonSerializable;

final class EntityListItem implements JsonSerializable
{
    /** @var string|null */
    private $name = null;

    /** @var Entity[] */
    private $values = [];

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
     * @return Entity[]
     */
    public function values()
    {
        return $this->values;
    }

    public static function builder(): EntityListItemBuilder
    {
        $instance = new self;
        return new class($constructor = function ($name, $values) use ($instance): EntityListItem {
            $instance->name = $name;
            $instance->values = $values;
            return $instance;
        }) extends EntityListItemBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->name = isset($data['name']) ? ((string) $data['name']) : null;
        $instance->values = [];
        if (isset($data['values'])) {
            foreach ($data['values'] as $item) {
                $element = isset($item) ? Entity::fromValue($item) : null;
                if ($element !== null) {
                    $instance->values[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'values' => $this->values
        ]);
    }
}
