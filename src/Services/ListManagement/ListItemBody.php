<?php

namespace Alexa\Model\Services\ListManagement;

use JsonSerializable;

final class ListItemBody implements JsonSerializable
{
    /** @var string|null */
    private $listId = null;

    /** @var string[] */
    private $listItemIds = [];

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
     * @return string[]
     */
    public function listItemIds()
    {
        return $this->listItemIds;
    }

    public static function builder(): ListItemBodyBuilder
    {
        $instance = new self;
        return new class($constructor = function ($listId, $listItemIds) use ($instance): ListItemBody {
            $instance->listId = $listId;
            $instance->listItemIds = $listItemIds;
            return $instance;
        }) extends ListItemBodyBuilder {};
    }

    /**
     * @param string $listId
     * @return self
     */
    public static function ofListId(string $listId): ListItemBody
    {
        $instance = new self;
        $instance->listId = $listId;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->listId = isset($data['listId']) ? ((string) $data['listId']) : null;
        $instance->listItemIds = [];
        if (isset($data['listItemIds'])) {
            foreach ($data['listItemIds'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->listItemIds[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'listId' => $this->listId,
            'listItemIds' => $this->listItemIds
        ]);
    }
}
