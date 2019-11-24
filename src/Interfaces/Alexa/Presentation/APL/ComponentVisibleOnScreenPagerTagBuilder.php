<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class ComponentVisibleOnScreenPagerTagBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $index = null;

    /** @var int|null */
    private $pageCount = null;

    /** @var bool|null */
    private $allowForward = null;

    /** @var bool|null */
    private $allowBackwards = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param int $index
     * @return self
     */
    public function withIndex(int $index): self
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param int $pageCount
     * @return self
     */
    public function withPageCount(int $pageCount): self
    {
        $this->pageCount = $pageCount;
        return $this;
    }

    /**
     * @param bool $allowForward
     * @return self
     */
    public function withAllowForward(bool $allowForward): self
    {
        $this->allowForward = $allowForward;
        return $this;
    }

    /**
     * @param bool $allowBackwards
     * @return self
     */
    public function withAllowBackwards(bool $allowBackwards): self
    {
        $this->allowBackwards = $allowBackwards;
        return $this;
    }

    public function build(): ComponentVisibleOnScreenPagerTag
    {
        return ($this->constructor)(
            $this->index,
            $this->pageCount,
            $this->allowForward,
            $this->allowBackwards
        );
    }
}
