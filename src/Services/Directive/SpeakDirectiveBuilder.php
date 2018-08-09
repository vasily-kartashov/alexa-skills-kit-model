<?php

namespace Alexa\Model\Services\Directive;

abstract class SpeakDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $speech = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withSpeech(string $speech): self
    {
        $this->speech = $speech;
        return $this;
    }

    public function build(): SpeakDirective
    {
        return ($this->constructor)(
            $this->speech
        );
    }
}
