<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class ControlMediaCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var MediaCommandType|null */
    private $command = null;

    /** @var string|null */
    private $componentId = null;

    /** @var string|null */
    private $value = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param MediaCommandType $command
     * @return self
     */
    public function withCommand(MediaCommandType $command): self
    {
        $this->command = $command;
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

    /**
     * @param string $value
     * @return self
     */
    public function withValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function build(): ControlMediaCommand
    {
        return ($this->constructor)(
            $this->command,
            $this->componentId,
            $this->value
        );
    }
}
