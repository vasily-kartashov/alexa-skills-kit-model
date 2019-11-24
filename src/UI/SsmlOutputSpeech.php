<?php

namespace Alexa\Model\UI;

use JsonSerializable;

final class SsmlOutputSpeech extends OutputSpeech implements JsonSerializable
{
    const TYPE = 'SSML';

    /** @var string|null */
    private $ssml = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function ssml()
    {
        return $this->ssml;
    }

    public static function builder(): SsmlOutputSpeechBuilder
    {
        $instance = new self;
        return new class($constructor = function ($ssml) use ($instance): SsmlOutputSpeech {
            $instance->ssml = $ssml;
            return $instance;
        }) extends SsmlOutputSpeechBuilder {};
    }

    /**
     * @param string $ssml
     * @return self
     */
    public static function ofSsml(string $ssml): SsmlOutputSpeech
    {
        $instance = new self;
        $instance->ssml = $ssml;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->ssml = isset($data['ssml']) ? ((string) $data['ssml']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'ssml' => $this->ssml
        ]);
    }
}
