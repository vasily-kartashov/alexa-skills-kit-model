<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Apl;

abstract class SetPageCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $componentId = null;

    /** @var Position|null */
    private $position = null;

    /** @var int|null */
    private $value = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withComponentId(string $componentId): self
    {
        $this->componentId = $componentId;
        return $this;
    }

    public function withPosition(Position $position): self
    {
        $this->position = $position;
        return $this;
    }

    public function withValue(int $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function build(): SetPageCommand
    {
        return ($this->constructor)(
            $this->componentId,
            $this->position,
            $this->value
        );
    }
}
