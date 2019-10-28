<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class SetValueCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $componentId = null;

    /** @var string|null */
    private $property = null;

    /** @var string|null */
    private $value = null;

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
     * @param string $property
     * @return self
     */
    public function withProperty(string $property): self
    {
        $this->property = $property;
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

    public function build(): SetValueCommand
    {
        return ($this->constructor)(
            $this->componentId,
            $this->property,
            $this->value
        );
    }
}
