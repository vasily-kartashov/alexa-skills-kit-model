<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class ParallelCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Command[] */
    private $commands = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $commands
     * @return self
     */
    public function withCommands(array $commands): self
    {
        foreach ($commands as $element) {
            assert($element instanceof Command);
        }
        $this->commands = $commands;
        return $this;
    }

    public function build(): ParallelCommand
    {
        return ($this->constructor)(
            $this->commands
        );
    }
}
