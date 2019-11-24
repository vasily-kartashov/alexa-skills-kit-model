<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class SendEventCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string[] */
    private $arguments = [];

    /** @var string[] */
    private $components = [];

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $arguments
     * @return self
     */
    public function withArguments(array $arguments): self
    {
        foreach ($arguments as $element) {
            assert(is_string($element));
        }
        $this->arguments = $arguments;
        return $this;
    }

    /**
     * @param array $components
     * @return self
     */
    public function withComponents(array $components): self
    {
        foreach ($components as $element) {
            assert(is_string($element));
        }
        $this->components = $components;
        return $this;
    }

    public function build(): SendEventCommand
    {
        return ($this->constructor)(
            $this->arguments,
            $this->components
        );
    }
}
