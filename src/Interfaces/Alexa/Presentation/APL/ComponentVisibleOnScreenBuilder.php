<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class ComponentVisibleOnScreenBuilder
{
    /** @var callable */
    private $constructor;

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

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $children
     * @return self
     */
    public function withChildren(array $children): self
    {
        foreach ($children as $element) {
            assert($element instanceof ComponentVisibleOnScreen);
        }
        $this->children = $children;
        return $this;
    }

    /**
     * @param array $entities
     * @return self
     */
    public function withEntities(array $entities): self
    {
        foreach ($entities as $element) {
            assert($element instanceof ComponentEntity);
        }
        $this->entities = $entities;
        return $this;
    }

    /**
     * @param string $id
     * @return self
     */
    public function withId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $position
     * @return self
     */
    public function withPosition(string $position): self
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @param ComponentVisibleOnScreenTags $tags
     * @return self
     */
    public function withTags(ComponentVisibleOnScreenTags $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @param array $transform
     * @return self
     */
    public function withTransform(array $transform): self
    {
        $this->transform = $transform;
        return $this;
    }

    /**
     * @param string $type
     * @return self
     */
    public function withType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $uid
     * @return self
     */
    public function withUid(string $uid): self
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @param float $visibility
     * @return self
     */
    public function withVisibility(float $visibility): self
    {
        $this->visibility = $visibility;
        return $this;
    }

    public function build(): ComponentVisibleOnScreen
    {
        return ($this->constructor)(
            $this->children,
            $this->entities,
            $this->id,
            $this->position,
            $this->tags,
            $this->transform,
            $this->type,
            $this->uid,
            $this->visibility
        );
    }
}
