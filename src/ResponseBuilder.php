<?php

namespace Alexa\Model;

use Alexa\Model\CanFulfill\CanFulfillIntent;
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

    /** @var CanFulfillIntent|null */
    private $canFulfillIntent = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param OutputSpeech $outputSpeech
     * @return self
     */
    public function withOutputSpeech(OutputSpeech $outputSpeech): self
    {
        $this->outputSpeech = $outputSpeech;
        return $this;
    }

    /**
     * @param Card $card
     * @return self
     */
    public function withCard(Card $card): self
    {
        $this->card = $card;
        return $this;
    }

    /**
     * @param Reprompt $reprompt
     * @return self
     */
    public function withReprompt(Reprompt $reprompt): self
    {
        $this->reprompt = $reprompt;
        return $this;
    }

    /**
     * @param array $directives
     * @return self
     */
    public function withDirectives(array $directives): self
    {
        foreach ($directives as $element) {
            assert($element instanceof Directive);
        }
        $this->directives = $directives;
        return $this;
    }

    /**
     * @param bool $shouldEndSession
     * @return self
     */
    public function withShouldEndSession(bool $shouldEndSession): self
    {
        $this->shouldEndSession = $shouldEndSession;
        return $this;
    }

    /**
     * @param CanFulfillIntent $canFulfillIntent
     * @return self
     */
    public function withCanFulfillIntent(CanFulfillIntent $canFulfillIntent): self
    {
        $this->canFulfillIntent = $canFulfillIntent;
        return $this;
    }

    public function build(): Response
    {
        return ($this->constructor)(
            $this->outputSpeech,
            $this->card,
            $this->reprompt,
            $this->directives,
            $this->shouldEndSession,
            $this->canFulfillIntent
        );
    }
}
