<?php

namespace Alexa\Model\UI;

use \JsonSerializable;

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
        $instance = new self();
        $constructor = function ($ssml) use ($instance): SsmlOutputSpeech {
            $instance->ssml = $ssml;
            return $instance;
        };
        return new class($constructor) extends SsmlOutputSpeechBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    public static function fromValue(array $data)
    {
        $instance = new self();
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
