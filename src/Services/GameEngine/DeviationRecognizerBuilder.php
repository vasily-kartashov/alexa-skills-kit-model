<?php

namespace Alexa\Model\Services\GameEngine;

abstract class DeviationRecognizerBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $recognizer = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $recognizer
     * @return self
     */
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
