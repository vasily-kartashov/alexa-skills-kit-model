<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class ComponentVisibleOnScreenTagsBuilder
{
    /** @var callable */
    private $constructor;

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

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param bool $checked
     * @return self
     */
    public function withChecked(bool $checked): self
    {
        $this->checked = $checked;
        return $this;
    }

    /**
     * @param bool $clickable
     * @return self
     */
    public function withClickable(bool $clickable): self
    {
        $this->clickable = $clickable;
        return $this;
    }

    /**
     * @param bool $disabled
     * @return self
     */
    public function withDisabled(bool $disabled): self
    {
        $this->disabled = $disabled;
        return $this;
    }

    /**
     * @param bool $focused
     * @return self
     */
    public function withFocused(bool $focused): self
    {
        $this->focused = $focused;
        return $this;
    }

    /**
     * @param ComponentVisibleOnScreenListTag $list
     * @return self
     */
    public function withList(ComponentVisibleOnScreenListTag $list): self
    {
        $this->list = $list;
        return $this;
    }

    /**
     * @param ComponentVisibleOnScreenListItemTag $listItem
     * @return self
     */
    public function withListItem(ComponentVisibleOnScreenListItemTag $listItem): self
    {
        $this->listItem = $listItem;
        return $this;
    }

    /**
     * @param ComponentVisibleOnScreenMediaTag $media
     * @return self
     */
    public function withMedia(ComponentVisibleOnScreenMediaTag $media): self
    {
        $this->media = $media;
        return $this;
    }

    /**
     * @param int $ordinal
     * @return self
     */
    public function withOrdinal(int $ordinal): self
    {
        $this->ordinal = $ordinal;
        return $this;
    }

    /**
     * @param ComponentVisibleOnScreenPagerTag $pager
     * @return self
     */
    public function withPager(ComponentVisibleOnScreenPagerTag $pager): self
    {
        $this->pager = $pager;
        return $this;
    }

    /**
     * @param ComponentVisibleOnScreenScrollableTag $scrollable
     * @return self
     */
    public function withScrollable(ComponentVisibleOnScreenScrollableTag $scrollable): self
    {
        $this->scrollable = $scrollable;
        return $this;
    }

    /**
     * @param bool $spoken
     * @return self
     */
    public function withSpoken(bool $spoken): self
    {
        $this->spoken = $spoken;
        return $this;
    }

    /**
     * @param ComponentVisibleOnScreenViewportTag $viewport
     * @return self
     */
    public function withViewport(ComponentVisibleOnScreenViewportTag $viewport): self
    {
        $this->viewport = $viewport;
        return $this;
    }

    public function build(): ComponentVisibleOnScreenTags
    {
        return ($this->constructor)(
            $this->checked,
            $this->clickable,
            $this->disabled,
            $this->focused,
            $this->list,
            $this->listItem,
            $this->media,
            $this->ordinal,
            $this->pager,
            $this->scrollable,
            $this->spoken,
            $this->viewport
        );
    }
}
