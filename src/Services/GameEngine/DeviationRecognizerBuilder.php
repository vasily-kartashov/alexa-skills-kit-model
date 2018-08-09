<?php

namespace Alexa\Model\Services\GameEngine;

abstract class DeviationRecognizerBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $recognizer = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withRecognizer(string $recognizer): self
    {
        $this->recognizer = $recognizer;
        return $this;
    }

    public function build(): DeviationRecognizer
    {
        return ($this->constructor)(
            $this->recognizer
        );
    }
}
