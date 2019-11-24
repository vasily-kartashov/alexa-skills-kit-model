<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class ComponentVisibleOnScreenMediaTag implements JsonSerializable
{
    /** @var int|null */
    private $positionInMilliseconds = null;

    /** @var ComponentVisibleOnScreenMediaTagStateEnum|null */
    private $state = null;

    /** @var bool|null */
    private $allowAdjustSeekPositionForward = null;

    /** @var bool|null */
    private $allowAdjustSeekPositionBackwards = null;

    /** @var bool|null */
    private $allowNext = null;

    /** @var bool|null */
    private $allowPrevious = null;

    /** @var ComponentEntity[] */
    private $entities = [];

    /** @var string|null */
    private $url = null;

    protected function __construct()
    {
    }

    /**
     * @return int|null
     */
    public function positionInMilliseconds()
    {
        return $this->positionInMilliseconds;
    }

    /**
     * @return ComponentVisibleOnScreenMediaTagStateEnum|null
     */
    public function state()
    {
        return $this->state;
    }

    /**
     * @return bool|null
     */
    public function allowAdjustSeekPositionForward()
    {
        return $this->allowAdjustSeekPositionForward;
    }

    /**
     * @return bool|null
     */
    public function allowAdjustSeekPositionBackwards()
    {
        return $this->allowAdjustSeekPositionBackwards;
    }

    /**
     * @return bool|null
     */
    public function allowNext()
    {
        return $this->allowNext;
    }

    /**
     * @return bool|null
     */
    public function allowPrevious()
    {
        return $this->allowPrevious;
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
    public function url()
    {
        return $this->url;
    }

    public static function builder(): ComponentVisibleOnScreenMediaTagBuilder
    {
        $instance = new self;
        return new class($constructor = function ($positionInMilliseconds, $state, $allowAdjustSeekPositionForward, $allowAdjustSeekPositionBackwards, $allowNext, $allowPrevious, $entities, $url) use ($instance): ComponentVisibleOnScreenMediaTag {
            $instance->positionInMilliseconds = $positionInMilliseconds;
            $instance->state = $state;
            $instance->allowAdjustSeekPositionForward = $allowAdjustSeekPositionForward;
            $instance->allowAdjustSeekPositionBackwards = $allowAdjustSeekPositionBackwards;
            $instance->allowNext = $allowNext;
            $instance->allowPrevious = $allowPrevious;
            $instance->entities = $entities;
            $instance->url = $url;
            return $instance;
        }) extends ComponentVisibleOnScreenMediaTagBuilder {};
    }

    /**
     * @param int $positionInMilliseconds
     * @return self
     */
    public static function ofPositionInMilliseconds(int $positionInMilliseconds): ComponentVisibleOnScreenMediaTag
    {
        $instance = new self;
        $instance->positionInMilliseconds = $positionInMilliseconds;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->positionInMilliseconds = isset($data['positionInMilliseconds']) ? ((int) $data['positionInMilliseconds']) : null;
        $instance->state = isset($data['state']) ? ComponentVisibleOnScreenMediaTagStateEnum::fromValue($data['state']) : null;
        $instance->allowAdjustSeekPositionForward = isset($data['allowAdjustSeekPositionForward']) ? ((bool) $data['allowAdjustSeekPositionForward']) : null;
        $instance->allowAdjustSeekPositionBackwards = isset($data['allowAdjustSeekPositionBackwards']) ? ((bool) $data['allowAdjustSeekPositionBackwards']) : null;
        $instance->allowNext = isset($data['allowNext']) ? ((bool) $data['allowNext']) : null;
        $instance->allowPrevious = isset($data['allowPrevious']) ? ((bool) $data['allowPrevious']) : null;
        $instance->entities = [];
        if (isset($data['entities'])) {
            foreach ($data['entities'] as $item) {
                $element = isset($item) ? ComponentEntity::fromValue($item) : null;
                if ($element !== null) {
                    $instance->entities[] = $element;
                }
            }
        }
        $instance->url = isset($data['url']) ? ((string) $data['url']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'positionInMilliseconds' => $this->positionInMilliseconds,
            'state' => $this->state,
            'allowAdjustSeekPositionForward' => $this->allowAdjustSeekPositionForward,
            'allowAdjustSeekPositionBackwards' => $this->allowAdjustSeekPositionBackwards,
            'allowNext' => $this->allowNext,
            'allowPrevious' => $this->allowPrevious,
            'entities' => $this->entities,
            'url' => $this->url
        ]);
    }
}
