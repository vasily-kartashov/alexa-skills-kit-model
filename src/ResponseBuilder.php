<?php

namespace Alexa\Model;

use Alexa\Model\UI\Card;
use Alexa\Model\UI\OutputSpeech;
use Alexa\Model\UI\Reprompt;

abstract class ResponseBuilder
{
    /** @var callable */
    private $constructor;

    /** @var OutputSpeech|null */
    private $outputSpeech = null;

    /** @var Card|null */
    private $card = null;

    /** @var Reprompt|null */
    private $reprompt = null;

    /** @var Directive[] */
    private $directives = [];

    /** @var bool|null */
    private $shouldEndSession = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withOutputSpeech(OutputSpeech $outputSpeech): self
    {
        $this->outputSpeech = $outputSpeech;
        return $this;
    }

    public function withCard(Card $card): self
    {
        $this->card = $card;
        return $this;
    }

    public function withReprompt(Reprompt $reprompt): self
    {
        $this->reprompt = $reprompt;
        return $this;
    }

    /**
     * @param Directive[] $directives
     * @return self
     */
    public function withDirectives(array $directives): self
    {
        $this->directives = $directives;
        return $this;
    }

    public function withShouldEndSession(bool $shouldEndSession): self
    {
        $this->shouldEndSession = $shouldEndSession;
        return $this;
    }

    public function build(): Response
    {
        return ($this->constructor)(
            $this->outputSpeech,
            $this->card,
            $this->reprompt,
            $this->directives,
            $this->shouldEndSession
        );
    }
}
