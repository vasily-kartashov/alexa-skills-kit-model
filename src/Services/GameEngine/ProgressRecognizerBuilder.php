<?php

namespace Alexa\Model\Services\GameEngine;

abstract class ProgressRecognizerBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $recognizer = null;

    /** @var float|null */
    private $completion = null;

    protected function __construct(callable $constructor)
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

    /**
     * @param float $completion
     * @return self
     */
    public function withCompletion(float $completion): self
    {
        $this->completion = $completion;
        return $this;
    }

    public function build(): ProgressRecognizer
    {
        return ($this->constructor)(
            $this->recognizer,
            $this->completion
        );
    }
}
