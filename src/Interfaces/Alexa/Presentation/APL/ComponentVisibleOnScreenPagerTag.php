<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class ComponentVisibleOnScreenPagerTag implements JsonSerializable
{
    /** @var int|null */
    private $index = null;

    /** @var int|null */
    private $pageCount = null;

    /** @var bool|null */
    private $allowForward = null;

    /** @var bool|null */
    private $allowBackwards = null;

    protected function __construct()
    {
    }

    /**
     * @return int|null
     */
    public function index()
    {
        return $this->index;
    }

    /**
     * @return int|null
     */
    public function pageCount()
    {
        return $this->pageCount;
    }

    /**
     * @return bool|null
     */
    public function allowForward()
    {
        return $this->allowForward;
    }

    /**
     * @return bool|null
     */
    public function allowBackwards()
    {
        return $this->allowBackwards;
    }

    public static function builder(): ComponentVisibleOnScreenPagerTagBuilder
    {
        $instance = new self;
        return new class($constructor = function ($index, $pageCount, $allowForward, $allowBackwards) use ($instance): ComponentVisibleOnScreenPagerTag {
            $instance->index = $index;
            $instance->pageCount = $pageCount;
            $instance->allowForward = $allowForward;
            $instance->allowBackwards = $allowBackwards;
            return $instance;
        }) extends ComponentVisibleOnScreenPagerTagBuilder {};
    }

    /**
     * @param int $index
     * @return self
     */
    public static function ofIndex(int $index): ComponentVisibleOnScreenPagerTag
    {
        $instance = new self;
        $instance->index = $index;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->index = isset($data['index']) ? ((int) $data['index']) : null;
        $instance->pageCount = isset($data['pageCount']) ? ((int) $data['pageCount']) : null;
        $instance->allowForward = isset($data['allowForward']) ? ((bool) $data['allowForward']) : null;
        $instance->allowBackwards = isset($data['allowBackwards']) ? ((bool) $data['allowBackwards']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'index' => $this->index,
            'pageCount' => $this->pageCount,
            'allowForward' => $this->allowForward,
            'allowBackwards' => $this->allowBackwards
        ]);
    }
}
