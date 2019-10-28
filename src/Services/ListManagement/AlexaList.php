<?php

namespace Alexa\Model\Services\ListManagement;

use \JsonSerializable;

final class AlexaList implements JsonSerializable
{
    /** @var string|null */
    private $listId = null;

    /** @var string|null */
    private $name = null;

    /** @var ListState|null */
    private $state = null;

    /** @var int|null */
    private $version = null;

    /** @var AlexaListItem[] */
    private $items = [];

    /** @var Links|null */
    private $links = null;

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
     * @return AlexaListItem[]
     */
    public function items()
    {
        return $this->items;
    }

    /**
     * @return Links|null
     */
    public function links()
    {
        return $this->links;
    }

    public static function builder(): AlexaListBuilder
    {
        $instance = new self;
        $constructor = function ($listId, $name, $state, $version, $items, $links) use ($instance): AlexaList {
            $instance->listId = $listId;
            $instance->name = $name;
            $instance->state = $state;
            $instance->version = $version;
            $instance->items = $items;
            $instance->links = $links;
            return $instance;
        };
        return new class($constructor) extends AlexaListBuilder
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
        $instance = new self;
        $instance->listId = isset($data['listId']) ? ((string) $data['listId']) : null;
        $instance->name = isset($data['name']) ? ((string) $data['name']) : null;
        $instance->state = isset($data['state']) ? ListState::fromValue($data['state']) : null;
        $instance->version = isset($data['version']) ? ((int) $data['version']) : null;
        $instance->items = [];
        if (isset($data['items'])) {
            foreach ($data['items'] as $item) {
                $element = isset($item) ? AlexaListItem::fromValue($item) : null;
                if ($element !== null) {
                    $instance->items[] = $element;
                }
            }
        }
        $instance->links = isset($data['links']) ? Links::fromValue($data['links']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'listId' => $this->listId,
            'name' => $this->name,
            'state' => $this->state,
            'version' => $this->version,
            'items' => $this->items,
            'links' => $this->links
        ]);
    }
}
