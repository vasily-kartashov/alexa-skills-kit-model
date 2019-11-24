<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class SequentialCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Command[] */
    private $catch = [];

    /** @var Command[] */
    private $commands = [];

    /** @var Command[] */
    private $finally = [];

    /** @var string|null */
    private $repeatCount = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $catch
     * @return self
     */
    public function withCatch(array $catch): self
    {
        foreach ($catch as $element) {
            assert($element instanceof Command);
        }
        $this->catch = $catch;
        return $this;
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
     * @param array $finally
     * @return self
     */
    public function withFinally(array $finally): self
    {
        foreach ($finally as $element) {
            assert($element instanceof Command);
        }
        $this->finally = $finally;
        return $this;
    }

    /**
     * @param string $repeatCount
     * @return self
     */
    public function withRepeatCount(string $repeatCount): self
    {
        $this->repeatCount = $repeatCount;
        return $this;
    }

    public function build(): SequentialCommand
    {
        return ($this->constructor)(
            $this->catch,
            $this->commands,
            $this->finally,
            $this->repeatCount
        );
    }
}
