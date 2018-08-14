<?php

namespace Alexa\Model\Services\ListManagement;

use \JsonSerializable;

final class UpdateListItemRequest implements JsonSerializable
{
    /** @var string|null */
    private $value = null;

    /** @var ListItemState|null */
    private $status = null;

    /** @var int|null */
    private $version = null;

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

    /**
     * @return int|null
     */
    public function version()
    {
        return $this->version;
    }

    public static function builder(): UpdateListItemRequestBuilder
    {
        $instance = new self();
        $constructor = function ($value, $status, $version) use ($instance): UpdateListItemRequest {
            $instance->value = $value;
            $instance->status = $status;
            $instance->version = $version;
            return $instance;
        };
        return new class($constructor) extends UpdateListItemRequestBuilder
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
        $instance = new self();
        $instance->value = isset($data['value']) ? ((string) $data['value']) : null;
        $instance->status = isset($data['status']) ? ListItemState::fromValue($data['status']) : null;
        $instance->version = isset($data['version']) ? ((int) $data['version']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'value' => $this->value,
            'status' => $this->status,
            'version' => $this->version
        ]);
    }
}
