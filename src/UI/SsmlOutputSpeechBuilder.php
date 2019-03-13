<?php

namespace Alexa\Model\UI;

abstract class SsmlOutputSpeechBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $ssml = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $ssml
     * @return self
     */
    public function withSsml(string $ssml): self
    {
        $this->ssml = $ssml;
        return $this;
    }

    public function build(): SsmlOutputSpeech
    {
        return ($this->constructor)(
            $this->ssml
        );
    }
}
