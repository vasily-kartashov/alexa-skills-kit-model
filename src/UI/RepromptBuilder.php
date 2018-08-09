<?php

namespace Alexa\Model\UI;

abstract class RepromptBuilder
{
    /** @var callable */
    private $constructor;

    /** @var OutputSpeech|null */
    private $outputSpeech = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withOutputSpeech(OutputSpeech $outputSpeech): self
    {
        $this->outputSpeech = $outputSpeech;
        return $this;
    }

    public function build(): Reprompt
    {
        return ($this->constructor)(
            $this->outputSpeech
        );
    }
}
