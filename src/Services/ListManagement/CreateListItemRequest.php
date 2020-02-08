<?php

namespace Alexa\Model\Services\ListManagement;

use JsonSerializable;

final class CreateListItemRequest implements JsonSerializable
{
    /** @var string|null */
    private $value = null;

    /** @var ListItemState|null */
    private $status = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * @return ListItemState|null
     */
    public function status()
    {
        return $this->status;
    }

    public static function builder(): CreateListItemRequestBuilder
    {
        $instance = new self;
        return new class($constructor = function ($value, $status) use ($instance): CreateListItemRequest {
            $instance->value = $value;
            $instance->status = $status;
            return $instance;
        }) extends CreateListItemRequestBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->value = isset($data['value']) ? ((string) $data['value']) : null;
        $instance->status = isset($data['status']) ? ListItemState::fromValue($data['status']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'value' => $this->value,
            'status' => $this->status
        ]);
    }
}
