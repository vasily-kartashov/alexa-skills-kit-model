<?php

namespace Alexa\Model\Services\ReminderManagement;

use \JsonSerializable;

final class SpokenText implements JsonSerializable
{
    /** @var string|null */
    private $locale = null;

    /** @var string|null */
    private $ssml = null;

    /** @var string|null */
    private $text = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function locale()
    {
        return $this->locale;
    }

    /**
     * @return string|null
     */
    public function ssml()
    {
        return $this->ssml;
    }

    /**
     * @return string|null
     */
    public function text()
    {
        return $this->text;
    }

    public static function builder(): SpokenTextBuilder
    {
        $instance = new self;
        $constructor = function ($locale, $ssml, $text) use ($instance): SpokenText {
            $instance->locale = $locale;
            $instance->ssml = $ssml;
            $instance->text = $text;
            return $instance;
        };
        return new class($constructor) extends SpokenTextBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param string $locale
     * @return self
     */
    public static function ofLocale(string $locale): SpokenText
    {
        $instance = new self;
        $instance->locale = $locale;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->locale = isset($data['locale']) ? ((string) $data['locale']) : null;
        $instance->ssml = isset($data['ssml']) ? ((string) $data['ssml']) : null;
        $instance->text = isset($data['text']) ? ((string) $data['text']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'locale' => $this->locale,
            'ssml' => $this->ssml,
            'text' => $this->text
        ]);
    }
}
