<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Apl;

abstract class AutoPageCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $componentId = null;

    /** @var int|null */
    private $count = null;

    /** @var int|null */
    private $duration = null;

    protected function __construct(callable $constructor)
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
     * @param int $count
     * @return self
     */
    public function withCount(int $count): self
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @param int $duration
     * @return self
     */
    public function withDuration(int $duration): self
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
