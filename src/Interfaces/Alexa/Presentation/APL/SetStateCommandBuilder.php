<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class SetStateCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $componentId = null;

    /** @var ComponentState|null */
    private $state = null;

    /** @var string|null */
    private $value = null;

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
     * @param ComponentState $state
     * @return self
     */
    public function withState(ComponentState $state): self
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @param string $value
     * @return self
     */
    public function withValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function build(): SetStateCommand
    {
        return ($this->constructor)(
            $this->componentId,
            $this->state,
            $this->value
        );
    }
}
