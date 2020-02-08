<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class ComponentEntity implements JsonSerializable
{
    /** @var string|null */
    private $type = null;

    /** @var string|null */
    private $value = null;

    /** @var string|null */
    private $id = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * @return string|null
     */
    public function id()
    {
        return $this->id;
    }

    public static function builder(): ComponentEntityBuilder
    {
        $instance = new self;
        return new class($constructor = function ($type, $value, $id) use ($instance): ComponentEntity {
            $instance->type = $type;
            $instance->value = $value;
            $instance->id = $id;
            return $instance;
        }) extends ComponentEntityBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = isset($data['type']) ? ((string) $data['type']) : null;
        $instance->value = isset($data['value']) ? ((string) $data['value']) : null;
        $instance->id = isset($data['id']) ? ((string) $data['id']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => $this->type,
            'value' => $this->value,
            'id' => $this->id
        ]);
    }
}
