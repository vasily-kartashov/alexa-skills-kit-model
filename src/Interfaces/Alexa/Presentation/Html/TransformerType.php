<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

use JsonSerializable;

final class TransformerType implements JsonSerializable
{
    /** @var string */
    private $value;

    public static function values(): array
    {
        static $instances;
        if (!isset($instances)) {
            $instances = [
                'ssmlToSpeech' => new static('ssmlToSpeech'),
                'textToSpeech' => new static('textToSpeech'),
                'textToHint'   => new static('textToHint'),
                'ssmlToText'   => new static('ssmlToText')
            ];
        }
        return $instances;
    }

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function SSML_TO_SPEECH(): self
    {
        return static::values()['ssmlToSpeech'];
    }

    public static function TEXT_TO_SPEECH(): self
    {
        return static::values()['textToSpeech'];
    }

    public static function TEXT_TO_HINT(): self
    {
        return static::values()['textToHint'];
    }

    public static function SSML_TO_TEXT(): self
    {
        return static::values()['ssmlToText'];
    }

    /**
     * @param string $text
     * @return self|null
     */
    public static function fromValue(string $text)
    {
        return static::values()[$text] ?? null;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
