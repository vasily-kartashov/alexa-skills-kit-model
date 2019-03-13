<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Apl;

abstract class ExecuteCommandsDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Command[] */
    private $commands = [];

    /** @var string|null */
    private $token = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Command[] $commands
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

    public function withToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function build(): ExecuteCommandsDirective
    {
        return ($this->constructor)(
            $this->commands,
            $this->token
        );
    }
}
