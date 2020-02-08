<?php

namespace Alexa\Model\Interfaces\Display;

use JsonSerializable;

final class TextContent implements JsonSerializable
{
    /** @var TextField|null */
    private $primaryText = null;

    /** @var TextField|null */
    private $secondaryText = null;

    /** @var TextField|null */
    private $tertiaryText = null;

    protected function __construct()
    {
    }

    /**
     * @return TextField|null
     */
    public function primaryText()
    {
        return $this->primaryText;
    }

    /**
     * @return TextField|null
     */
    public function secondaryText()
    {
        return $this->secondaryText;
    }

    /**
     * @return TextField|null
     */
    public function tertiaryText()
    {
        return $this->tertiaryText;
    }

    public static function builder(): TextContentBuilder
    {
        $instance = new self;
        return new class($constructor = function ($primaryText, $secondaryText, $tertiaryText) use ($instance): TextContent {
            $instance->primaryText = $primaryText;
            $instance->secondaryText = $secondaryText;
            $instance->tertiaryText = $tertiaryText;
            return $instance;
        }) extends TextContentBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->primaryText = isset($data['primaryText']) ? TextField::fromValue($data['primaryText']) : null;
        $instance->secondaryText = isset($data['secondaryText']) ? TextField::fromValue($data['secondaryText']) : null;
        $instance->tertiaryText = isset($data['tertiaryText']) ? TextField::fromValue($data['tertiaryText']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'primaryText' => $this->primaryText,
            'secondaryText' => $this->secondaryText,
            'tertiaryText' => $this->tertiaryText
        ]);
    }
}
