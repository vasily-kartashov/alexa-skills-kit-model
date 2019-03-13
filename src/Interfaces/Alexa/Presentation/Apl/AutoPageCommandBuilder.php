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

    public function withComponentId(string $componentId): self
    {
        $this->componentId = $componentId;
        return $this;
    }

    public function withCount(int $count): self
    {
        $this->count = $count;
        return $this;
    }

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
