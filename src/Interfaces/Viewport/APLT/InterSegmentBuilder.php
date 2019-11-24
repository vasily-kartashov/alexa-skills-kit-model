<?php

namespace Alexa\Model\Interfaces\Viewport\APLT;

abstract class InterSegmentBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $x = null;

    /** @var int|null */
    private $y = null;

    /** @var string|null */
    private $characters = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param int $x
     * @return self
     */
    public function withX(int $x): self
    {
        $this->x = $x;
        return $this;
    }

    /**
     * @param int $y
     * @return self
     */
    public function withY(int $y): self
    {
        $this->y = $y;
        return $this;
    }

    /**
     * @param string $characters
     * @return self
     */
    public function withCharacters(string $characters): self
    {
        $this->characters = $characters;
        return $this;
    }

    public function build(): InterSegment
    {
        return ($this->constructor)(
            $this->x,
            $this->y,
            $this->characters
        );
    }
}
