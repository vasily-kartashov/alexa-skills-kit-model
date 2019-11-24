<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class ComponentVisibleOnScreenScrollableTagBuilder
{
    /** @var callable */
    private $constructor;

    /** @var ComponentVisibleOnScreenScrollableTagDirectionEnum|null */
    private $direction = null;

    /** @var bool|null */
    private $allowForward = null;

    /** @var bool|null */
    private $allowBackward = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param ComponentVisibleOnScreenScrollableTagDirectionEnum $direction
     * @return self
     */
    public function withDirection(ComponentVisibleOnScreenScrollableTagDirectionEnum $direction): self
    {
        $this->direction = $direction;
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
     * @param bool $allowBackward
     * @return self
     */
    public function withAllowBackward(bool $allowBackward): self
    {
        $this->allowBackward = $allowBackward;
        return $this;
    }

    public function build(): ComponentVisibleOnScreenScrollableTag
    {
        return ($this->constructor)(
            $this->direction,
            $this->allowForward,
            $this->allowBackward
        );
    }
}
