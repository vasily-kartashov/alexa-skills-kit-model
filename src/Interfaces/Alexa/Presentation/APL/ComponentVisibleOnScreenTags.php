<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class ComponentVisibleOnScreenTags implements JsonSerializable
{
    /** @var bool|null */
    private $checked = null;

    /** @var bool|null */
    private $clickable = null;

    /** @var bool|null */
    private $disabled = null;

    /** @var bool|null */
    private $focused = null;

    /** @var ComponentVisibleOnScreenListTag|null */
    private $list = null;

    /** @var ComponentVisibleOnScreenListItemTag|null */
    private $listItem = null;

    /** @var ComponentVisibleOnScreenMediaTag|null */
    private $media = null;

    /** @var int|null */
    private $ordinal = null;

    /** @var ComponentVisibleOnScreenPagerTag|null */
    private $pager = null;

    /** @var ComponentVisibleOnScreenScrollableTag|null */
    private $scrollable = null;

    /** @var bool|null */
    private $spoken = null;

    /** @var ComponentVisibleOnScreenViewportTag|null */
    private $viewport = null;

    protected function __construct()
    {
    }

    /**
     * @return bool|null
     */
    public function checked()
    {
        return $this->checked;
    }

    /**
     * @return bool|null
     */
    public function clickable()
    {
        return $this->clickable;
    }

    /**
     * @return bool|null
     */
    public function disabled()
    {
        return $this->disabled;
    }

    /**
     * @return bool|null
     */
    public function focused()
    {
        return $this->focused;
    }

    /**
     * @return ComponentVisibleOnScreenListTag|null
     */
    public function list()
    {
        return $this->list;
    }

    /**
     * @return ComponentVisibleOnScreenListItemTag|null
     */
    public function listItem()
    {
        return $this->listItem;
    }

    /**
     * @return ComponentVisibleOnScreenMediaTag|null
     */
    public function media()
    {
        return $this->media;
    }

    /**
     * @return int|null
     */
    public function ordinal()
    {
        return $this->ordinal;
    }

    /**
     * @return ComponentVisibleOnScreenPagerTag|null
     */
    public function pager()
    {
        return $this->pager;
    }

    /**
     * @return ComponentVisibleOnScreenScrollableTag|null
     */
    public function scrollable()
    {
        return $this->scrollable;
    }

    /**
     * @return bool|null
     */
    public function spoken()
    {
        return $this->spoken;
    }

    /**
     * @return ComponentVisibleOnScreenViewportTag|null
     */
    public function viewport()
    {
        return $this->viewport;
    }

    public static function builder(): ComponentVisibleOnScreenTagsBuilder
    {
        $instance = new self;
        return new class($constructor = function ($checked, $clickable, $disabled, $focused, $list, $listItem, $media, $ordinal, $pager, $scrollable, $spoken, $viewport) use ($instance): ComponentVisibleOnScreenTags {
            $instance->checked = $checked;
            $instance->clickable = $clickable;
            $instance->disabled = $disabled;
            $instance->focused = $focused;
            $instance->list = $list;
            $instance->listItem = $listItem;
            $instance->media = $media;
            $instance->ordinal = $ordinal;
            $instance->pager = $pager;
            $instance->scrollable = $scrollable;
            $instance->spoken = $spoken;
            $instance->viewport = $viewport;
            return $instance;
        }) extends ComponentVisibleOnScreenTagsBuilder {};
    }

    /**
     * @param bool $checked
     * @return self
     */
    public static function ofChecked(bool $checked): ComponentVisibleOnScreenTags
    {
        $instance = new self;
        $instance->checked = $checked;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->checked = isset($data['checked']) ? ((bool) $data['checked']) : null;
        $instance->clickable = isset($data['clickable']) ? ((bool) $data['clickable']) : null;
        $instance->disabled = isset($data['disabled']) ? ((bool) $data['disabled']) : null;
        $instance->focused = isset($data['focused']) ? ((bool) $data['focused']) : null;
        $instance->list = isset($data['list']) ? ComponentVisibleOnScreenListTag::fromValue($data['list']) : null;
        $instance->listItem = isset($data['listItem']) ? ComponentVisibleOnScreenListItemTag::fromValue($data['listItem']) : null;
        $instance->media = isset($data['media']) ? ComponentVisibleOnScreenMediaTag::fromValue($data['media']) : null;
        $instance->ordinal = isset($data['ordinal']) ? ((int) $data['ordinal']) : null;
        $instance->pager = isset($data['pager']) ? ComponentVisibleOnScreenPagerTag::fromValue($data['pager']) : null;
        $instance->scrollable = isset($data['scrollable']) ? ComponentVisibleOnScreenScrollableTag::fromValue($data['scrollable']) : null;
        $instance->spoken = isset($data['spoken']) ? ((bool) $data['spoken']) : null;
        $instance->viewport = isset($data['viewport']) ? ComponentVisibleOnScreenViewportTag::fromValue($data['viewport']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'checked' => $this->checked,
            'clickable' => $this->clickable,
            'disabled' => $this->disabled,
            'focused' => $this->focused,
            'list' => $this->list,
            'listItem' => $this->listItem,
            'media' => $this->media,
            'ordinal' => $this->ordinal,
            'pager' => $this->pager,
            'scrollable' => $this->scrollable,
            'spoken' => $this->spoken,
            'viewport' => $this->viewport
        ]);
    }
}
