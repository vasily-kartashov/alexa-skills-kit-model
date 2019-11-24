<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class AutoPageCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $componentId = null;

    /** @var string|null */
    private $count = null;

    /** @var string|null */
    private $duration = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
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

    /**
     * @param string $count
     * @return self
     */
    public function withCount(string $count): self
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @param string $duration
     * @return self
     */
    public function withDuration(string $duration): self
    {
        $this->duration = $duration;
        return $this;
    }

    public function build(): AutoPageCommand
    {
        return ($this->constructor)(
            $this->componentId,
            $this->count,
            $this->duration
        );
    }
}
