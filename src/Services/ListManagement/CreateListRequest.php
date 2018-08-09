<?php

namespace Alexa\Model\Services\ListManagement;

use \JsonSerializable;

final class CreateListRequest implements JsonSerializable
{
    /** @var string|null */
    private $name = null;

    /** @var ListState|null */
    private $state = null;

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

    public static function builder(): CreateListRequestBuilder
    {
        $instance = new self();
        $constructor = function ($name, $state) use ($instance): CreateListRequest {
            $instance->name = $name;
            $instance->state = $state;
            return $instance;
        };
        return new class($constructor) extends CreateListRequestBuilder
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
        $instance->state = isset($data['state']) ? ListState::fromValue($data['state']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'state' => $this->state
        ]);
    }
}
