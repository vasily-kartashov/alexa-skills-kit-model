<?php

namespace Alexa\Model\Services\ListManagement;

use JsonSerializable;

final class AlexaListMetadata implements JsonSerializable
{
    /** @var string|null */
    private $listId = null;

    /** @var string|null */
    private $name = null;

    /** @var ListState|null */
    private $state = null;

    /** @var int|null */
    private $version = null;

    /** @var Status[] */
    private $statusMap = [];

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function listId()
    {
        return $this->listId;
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

    /**
     * @return Status[]
     */
    public function statusMap()
    {
        return $this->statusMap;
    }

    public static function builder(): AlexaListMetadataBuilder
    {
        $instance = new self;
        return new class($constructor = function ($listId, $name, $state, $version, $statusMap) use ($instance): AlexaListMetadata {
            $instance->listId = $listId;
            $instance->name = $name;
            $instance->state = $state;
            $instance->version = $version;
            $instance->statusMap = $statusMap;
            return $instance;
        }) extends AlexaListMetadataBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->listId = isset($data['listId']) ? ((string) $data['listId']) : null;
        $instance->name = isset($data['name']) ? ((string) $data['name']) : null;
        $instance->state = isset($data['state']) ? ListState::fromValue($data['state']) : null;
        $instance->version = isset($data['version']) ? ((int) $data['version']) : null;
        $instance->statusMap = [];
        if (isset($data['statusMap'])) {
            foreach ($data['statusMap'] as $item) {
                $element = isset($item) ? Status::fromValue($item) : null;
                if ($element !== null) {
                    $instance->statusMap[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'listId' => $this->listId,
            'name' => $this->name,
            'state' => $this->state,
            'version' => $this->version,
            'statusMap' => $this->statusMap
        ]);
    }
}
