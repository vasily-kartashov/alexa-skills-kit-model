<?php

namespace Alexa\Model\Services\ListManagement;

use JsonSerializable;

final class AlexaListItem implements JsonSerializable
{
    /** @var string|null */
    private $id = null;

    /** @var int|null */
    private $version = null;

    /** @var string|null */
    private $value = null;

    /** @var ListItemState|null */
    private $status = null;

    /** @var string|null */
    private $createdTime = null;

    /** @var string|null */
    private $updatedTime = null;

    /** @var string|null */
    private $href = null;

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
     * @return int|null
     */
    public function version()
    {
        return $this->version;
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
     * @return string|null
     */
    public function createdTime()
    {
        return $this->createdTime;
    }

    /**
     * @return string|null
     */
    public function updatedTime()
    {
        return $this->updatedTime;
    }

    /**
     * @return string|null
     */
    public function href()
    {
        return $this->href;
    }

    public static function builder(): AlexaListItemBuilder
    {
        $instance = new self;
        return new class($constructor = function ($id, $version, $value, $status, $createdTime, $updatedTime, $href) use ($instance): AlexaListItem {
            $instance->id = $id;
            $instance->version = $version;
            $instance->value = $value;
            $instance->status = $status;
            $instance->createdTime = $createdTime;
            $instance->updatedTime = $updatedTime;
            $instance->href = $href;
            return $instance;
        }) extends AlexaListItemBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->id = isset($data['id']) ? ((string) $data['id']) : null;
        $instance->version = isset($data['version']) ? ((int) $data['version']) : null;
        $instance->value = isset($data['value']) ? ((string) $data['value']) : null;
        $instance->status = isset($data['status']) ? ListItemState::fromValue($data['status']) : null;
        $instance->createdTime = isset($data['createdTime']) ? ((string) $data['createdTime']) : null;
        $instance->updatedTime = isset($data['updatedTime']) ? ((string) $data['updatedTime']) : null;
        $instance->href = isset($data['href']) ? ((string) $data['href']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'id' => $this->id,
            'version' => $this->version,
            'value' => $this->value,
            'status' => $this->status,
            'createdTime' => $this->createdTime,
            'updatedTime' => $this->updatedTime,
            'href' => $this->href
        ]);
    }
}
