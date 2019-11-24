<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class ComponentVisibleOnScreen implements JsonSerializable
{
    /** @var ComponentVisibleOnScreen[] */
    private $children = [];

    /** @var ComponentEntity[] */
    private $entities = [];

    /** @var string|null */
    private $id = null;

    /** @var string|null */
    private $position = null;

    /** @var ComponentVisibleOnScreenTags|null */
    private $tags = null;

    /** @var array */
    private $transform = [];

    /** @var string|null */
    private $type = null;

    /** @var string|null */
    private $uid = null;

    /** @var float|null */
    private $visibility = null;

    protected function __construct()
    {
    }

    /**
     * @return ComponentVisibleOnScreen[]
     */
    public function children()
    {
        return $this->children;
    }

    /**
     * @return ComponentEntity[]
     */
    public function entities()
    {
        return $this->entities;
    }

    /**
     * @return string|null
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function position()
    {
        return $this->position;
    }

    /**
     * @return ComponentVisibleOnScreenTags|null
     */
    public function tags()
    {
        return $this->tags;
    }

    /**
     * @return array
     */
    public function transform()
    {
        return $this->transform;
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
    public function uid()
    {
        return $this->uid;
    }

    /**
     * @return float|null
     */
    public function visibility()
    {
        return $this->visibility;
    }

    public static function builder(): ComponentVisibleOnScreenBuilder
    {
        $instance = new self;
        $constructor = function ($children, $entities, $id, $position, $tags, $transform, $type, $uid, $visibility) use ($instance): ComponentVisibleOnScreen {
            $instance->children = $children;
            $instance->entities = $entities;
            $instance->id = $id;
            $instance->position = $position;
            $instance->tags = $tags;
            $instance->transform = $transform;
            $instance->type = $type;
            $instance->uid = $uid;
            $instance->visibility = $visibility;
            return $instance;
        };
        return new class($constructor) extends ComponentVisibleOnScreenBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $children
     * @return self
     */
    public static function ofChildren(array $children): ComponentVisibleOnScreen
    {
        $instance = new self;
        $instance->children = $children;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->children = [];
        if (isset($data['children'])) {
            foreach ($data['children'] as $item) {
                $element = isset($item) ? ComponentVisibleOnScreen::fromValue($item) : null;
                if ($element !== null) {
                    $instance->children[] = $element;
                }
            }
        }
        $instance->entities = [];
        if (isset($data['entities'])) {
            foreach ($data['entities'] as $item) {
                $element = isset($item) ? ComponentEntity::fromValue($item) : null;
                if ($element !== null) {
                    $instance->entities[] = $element;
                }
            }
        }
        $instance->id = isset($data['id']) ? ((string) $data['id']) : null;
        $instance->position = isset($data['position']) ? ((string) $data['position']) : null;
        $instance->tags = isset($data['tags']) ? ComponentVisibleOnScreenTags::fromValue($data['tags']) : null;
        $instance->transform = [];
        if (isset($data['transform'])) {
            foreach ($data['transform'] as $item) {
                $element = $item;
                if ($element !== null) {
                    $instance->transform[] = $element;
                }
            }
        }
        $instance->type = isset($data['type']) ? ((string) $data['type']) : null;
        $instance->uid = isset($data['uid']) ? ((string) $data['uid']) : null;
        $instance->visibility = isset($data['visibility']) ? ((float) $data['visibility']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'children' => $this->children,
            'entities' => $this->entities,
            'id' => $this->id,
            'position' => $this->position,
            'tags' => $this->tags,
            'transform' => $this->transform,
            'type' => $this->type,
            'uid' => $this->uid,
            'visibility' => $this->visibility
        ]);
    }
}
