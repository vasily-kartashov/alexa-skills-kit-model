<?php

namespace Alexa\Model\Services\GameEngine;

use JsonSerializable;

final class Pattern implements JsonSerializable
{
    /** @var string[] */
    private $gadgetIds = [];

    /** @var string[] */
    private $colors = [];

    /** @var InputEventActionType|null */
    private $action = null;

    /** @var int|null */
    private $repeat = null;

    protected function __construct()
    {
    }

    /**
     * @return string[]
     */
    public function gadgetIds()
    {
        return $this->gadgetIds;
    }

    /**
     * @return string[]
     */
    public function colors()
    {
        return $this->colors;
    }

    /**
     * @return InputEventActionType|null
     */
    public function action()
    {
        return $this->action;
    }

    /**
     * @return int|null
     */
    public function repeat()
    {
        return $this->repeat;
    }

    public static function builder(): PatternBuilder
    {
        $instance = new self;
        return new class($constructor = function ($gadgetIds, $colors, $action, $repeat) use ($instance): Pattern {
            $instance->gadgetIds = $gadgetIds;
            $instance->colors = $colors;
            $instance->action = $action;
            $instance->repeat = $repeat;
            return $instance;
        }) extends PatternBuilder {};
    }

    /**
     * @param array $gadgetIds
     * @return self
     */
    public static function ofGadgetIds(array $gadgetIds): Pattern
    {
        $instance = new self;
        $instance->gadgetIds = $gadgetIds;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->gadgetIds = [];
        if (isset($data['gadgetIds'])) {
            foreach ($data['gadgetIds'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->gadgetIds[] = $element;
                }
            }
        }
        $instance->colors = [];
        if (isset($data['colors'])) {
            foreach ($data['colors'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->colors[] = $element;
                }
            }
        }
        $instance->action = isset($data['action']) ? InputEventActionType::fromValue($data['action']) : null;
        $instance->repeat = isset($data['repeat']) ? ((int) $data['repeat']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'gadgetIds' => $this->gadgetIds,
            'colors' => $this->colors,
            'action' => $this->action,
            'repeat' => $this->repeat
        ]);
    }
}
