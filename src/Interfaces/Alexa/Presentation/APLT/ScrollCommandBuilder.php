<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

abstract class ScrollCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $distance = null;

    /** @var string|null */
    private $componentId = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $distance
     * @return self
     */
    public function withDistance(string $distance): self
    {
        $this->distance = $distance;
        return $this;
    }

    /**
     * @param string $componentId
     * @return self
     */
    public function withComponentId(string $componentId): self
    {
        $this->componentId = $componentId;
        return $this;
    }

    public function build(): ScrollCommand
    {
        return ($this->constructor)(
            $this->distance,
            $this->componentId
        );
    }
}
