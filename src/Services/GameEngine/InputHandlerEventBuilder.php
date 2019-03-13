<?php

namespace Alexa\Model\Services\GameEngine;

abstract class InputHandlerEventBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $name = null;

    /** @var InputEvent[] */
    private $inputEvents = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $name
     * @return self
     */
    public function withName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param InputEvent[] $inputEvents
     * @return self
     */
    public function withInputEvents(array $inputEvents): self
    {
        foreach ($inputEvents as $element) {
            assert($element instanceof InputEvent);
        }
        $this->inputEvents = $inputEvents;
        return $this;
    }

    public function build(): InputHandlerEvent
    {
        return ($this->constructor)(
            $this->name,
            $this->inputEvents
        );
    }
}
