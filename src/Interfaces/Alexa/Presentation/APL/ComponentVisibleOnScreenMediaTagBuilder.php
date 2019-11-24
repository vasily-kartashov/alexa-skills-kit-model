<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class ComponentVisibleOnScreenMediaTagBuilder
{
    /** @var callable */
    private $constructor;

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

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param int $positionInMilliseconds
     * @return self
     */
    public function withPositionInMilliseconds(int $positionInMilliseconds): self
    {
        $this->positionInMilliseconds = $positionInMilliseconds;
        return $this;
    }

    /**
     * @param ComponentVisibleOnScreenMediaTagStateEnum $state
     * @return self
     */
    public function withState(ComponentVisibleOnScreenMediaTagStateEnum $state): self
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @param bool $allowAdjustSeekPositionForward
     * @return self
     */
    public function withAllowAdjustSeekPositionForward(bool $allowAdjustSeekPositionForward): self
    {
        $this->allowAdjustSeekPositionForward = $allowAdjustSeekPositionForward;
        return $this;
    }

    /**
     * @param bool $allowAdjustSeekPositionBackwards
     * @return self
     */
    public function withAllowAdjustSeekPositionBackwards(bool $allowAdjustSeekPositionBackwards): self
    {
        $this->allowAdjustSeekPositionBackwards = $allowAdjustSeekPositionBackwards;
        return $this;
    }

    /**
     * @param bool $allowNext
     * @return self
     */
    public function withAllowNext(bool $allowNext): self
    {
        $this->allowNext = $allowNext;
        return $this;
    }

    /**
     * @param bool $allowPrevious
     * @return self
     */
    public function withAllowPrevious(bool $allowPrevious): self
    {
        $this->allowPrevious = $allowPrevious;
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
     * @param string $url
     * @return self
     */
    public function withUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function build(): ComponentVisibleOnScreenMediaTag
    {
        return ($this->constructor)(
            $this->positionInMilliseconds,
            $this->state,
            $this->allowAdjustSeekPositionForward,
            $this->allowAdjustSeekPositionBackwards,
            $this->allowNext,
            $this->allowPrevious,
            $this->entities,
            $this->url
        );
    }
}
