<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Html;

use JsonSerializable;

final class TransformerType implements JsonSerializable
{
    /** @var string */
    private $value;

    private static function instances(): array
    {
        static $instances;
        if (!$instances) {
            $instances = [
                'ssmlToSpeech' => new static('ssmlToSpeech'),
                'textToSpeech' => new static('textToSpeech'),
                'textToHint' => new static('textToHint'),
                'ssmlToText' => new static('ssmlToText'),
                'null' => new static('null')
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
        return static::instances()['ssmlToSpeech'];
    }

    public static function TEXT_TO_SPEECH(): self
    {
        return static::instances()['textToSpeech'];
    }

    public static function TEXT_TO_HINT(): self
    {
        return static::instances()['textToHint'];
    }

    public static function SSML_TO_TEXT(): self
    {
        return static::instances()['ssmlToText'];
    }

    public static function NULL(): self
    {
        return static::instances()['null'];
    }

    /**
     * @param string $text
     * @return self|null
     */
    public static function fromValue(string $text)
    {
        return static::instances()[$text] ?? null;
    }

    /**
     * @return self[]
     */
    public static function values()
    {
        return static::instances();
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
