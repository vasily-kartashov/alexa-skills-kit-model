<?php

namespace Alexa\Model;

use Alexa\Model\CanFulfill\CanFulfillIntent;
use Alexa\Model\UI\Card;
use Alexa\Model\UI\OutputSpeech;
use Alexa\Model\UI\Reprompt;
use \JsonSerializable;

final class Response implements JsonSerializable
{
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

    protected function __construct()
    {
    }

    /**
     * @return OutputSpeech|null
     */
    public function outputSpeech()
    {
        return $this->outputSpeech;
    }

    /**
     * @return Card|null
     */
    public function card()
    {
        return $this->card;
    }

    /**
     * @return Reprompt|null
     */
    public function reprompt()
    {
        return $this->reprompt;
    }

    /**
     * @return Directive[]
     */
    public function directives()
    {
        return $this->directives;
    }

    /**
     * @return bool|null
     */
    public function shouldEndSession()
    {
        return $this->shouldEndSession;
    }

    /**
     * @return CanFulfillIntent|null
     */
    public function canFulfillIntent()
    {
        return $this->canFulfillIntent;
    }

    public static function builder(): ResponseBuilder
    {
        $instance = new self();
        $constructor = function ($outputSpeech, $card, $reprompt, $directives, $shouldEndSession, $canFulfillIntent) use ($instance): Response {
            $instance->outputSpeech = $outputSpeech;
            $instance->card = $card;
            $instance->reprompt = $reprompt;
            $instance->directives = $directives;
            $instance->shouldEndSession = $shouldEndSession;
            $instance->canFulfillIntent = $canFulfillIntent;
            return $instance;
        };
        return new class($constructor) extends ResponseBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->outputSpeech = isset($data['outputSpeech']) ? OutputSpeech::fromValue($data['outputSpeech']) : null;
        $instance->card = isset($data['card']) ? Card::fromValue($data['card']) : null;
        $instance->reprompt = isset($data['reprompt']) ? Reprompt::fromValue($data['reprompt']) : null;
        $instance->directives = [];
        if (isset($data['directives'])) {
            foreach ($data['directives'] as $item) {
                $element = isset($item) ? Directive::fromValue($item) : null;
                if ($element !== null) {
                    $instance->directives[] = $element;
                }
            }
        }
        $instance->shouldEndSession = isset($data['shouldEndSession']) ? ((bool) $data['shouldEndSession']) : null;
        $instance->canFulfillIntent = isset($data['canFulfillIntent']) ? CanFulfillIntent::fromValue($data['canFulfillIntent']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'outputSpeech' => $this->outputSpeech,
            'card' => $this->card,
            'reprompt' => $this->reprompt,
            'directives' => $this->directives,
            'shouldEndSession' => $this->shouldEndSession,
            'canFulfillIntent' => $this->canFulfillIntent
        ]);
    }
}
