<?php

namespace Alexa\Model\UI;

use JsonSerializable;

final class Reprompt implements JsonSerializable
{
    /** @var OutputSpeech|null */
    private $outputSpeech = null;

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

    public static function builder(): RepromptBuilder
    {
        $instance = new self;
        return new class($constructor = function ($outputSpeech) use ($instance): Reprompt {
            $instance->outputSpeech = $outputSpeech;
            return $instance;
        }) extends RepromptBuilder {};
    }

    /**
     * @param OutputSpeech $outputSpeech
     * @return self
     */
    public static function ofOutputSpeech(OutputSpeech $outputSpeech): Reprompt
    {
        $instance = new self;
        $instance->outputSpeech = $outputSpeech;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->outputSpeech = isset($data['outputSpeech']) ? OutputSpeech::fromValue($data['outputSpeech']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'outputSpeech' => $this->outputSpeech
        ]);
    }
}
