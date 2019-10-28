<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

abstract class ApltExecuteCommandsDirectiveBuilder
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

    /**
     * @param string $token
     * @return self
     */
    public function withToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function build(): ApltExecuteCommandsDirective
    {
        return ($this->constructor)(
            $this->commands,
            $this->token
        );
    }
}
