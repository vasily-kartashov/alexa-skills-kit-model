<?php

namespace Alexa\Model\Services\ReminderManagement;

use JsonSerializable;

final class AlertInfoSpokenInfo implements JsonSerializable
{
    /** @var SpokenText[] */
    private $content = [];

    protected function __construct()
    {
    }

    /**
     * @return SpokenText[]
     */
    public function content()
    {
        return $this->content;
    }

    public static function builder(): AlertInfoSpokenInfoBuilder
    {
        $instance = new self;
        return new class($constructor = function ($content) use ($instance): AlertInfoSpokenInfo {
            $instance->content = $content;
            return $instance;
        }) extends AlertInfoSpokenInfoBuilder {};
    }

    /**
     * @param array $content
     * @return self
     */
    public static function ofContent(array $content): AlertInfoSpokenInfo
    {
        $instance = new self;
        $instance->content = $content;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->content = [];
        if (isset($data['content'])) {
            foreach ($data['content'] as $item) {
                $element = isset($item) ? SpokenText::fromValue($item) : null;
                if ($element !== null) {
                    $instance->content[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'content' => $this->content
        ]);
    }
}
