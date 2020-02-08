<?php

namespace Alexa\Model\Services\GameEngine;

use JsonSerializable;

final class InputEvent implements JsonSerializable
{
    /** @var string|null */
    private $gadgetId = null;

    /** @var string|null */
    private $timestamp = null;

    /** @var InputEventActionType|null */
    private $action = null;

    /** @var string|null */
    private $color = null;

    /** @var string|null */
    private $feature = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function gadgetId()
    {
        return $this->gadgetId;
    }

    /**
     * @return string|null
     */
    public function timestamp()
    {
        return $this->timestamp;
    }

    /**
     * @return InputEventActionType|null
     */
    public function action()
    {
        return $this->action;
    }

    /**
     * @return string|null
     */
    public function color()
    {
        return $this->color;
    }

    /**
     * @return string|null
     */
    public function feature()
    {
        return $this->feature;
    }

    public static function builder(): InputEventBuilder
    {
        $instance = new self;
        return new class($constructor = function ($gadgetId, $timestamp, $action, $color, $feature) use ($instance): InputEvent {
            $instance->gadgetId = $gadgetId;
            $instance->timestamp = $timestamp;
            $instance->action = $action;
            $instance->color = $color;
            $instance->feature = $feature;
            return $instance;
        }) extends InputEventBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->gadgetId = isset($data['gadgetId']) ? ((string) $data['gadgetId']) : null;
        $instance->timestamp = isset($data['timestamp']) ? ((string) $data['timestamp']) : null;
        $instance->action = isset($data['action']) ? InputEventActionType::fromValue($data['action']) : null;
        $instance->color = isset($data['color']) ? ((string) $data['color']) : null;
        $instance->feature = isset($data['feature']) ? ((string) $data['feature']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'gadgetId' => $this->gadgetId,
            'timestamp' => $this->timestamp,
            'action' => $this->action,
            'color' => $this->color,
            'feature' => $this->feature
        ]);
    }
}
