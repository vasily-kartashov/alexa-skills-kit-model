<?php

namespace Alexa\Model\Services\GameEngine;

use JsonSerializable;

final class PatternRecognizer extends Recognizer implements JsonSerializable
{
    const TYPE = 'match';

    /** @var PatternRecognizerAnchorType|null */
    private $anchor = null;

    /** @var bool|null */
    private $fuzzy = null;

    /** @var string[] */
    private $gadgetIds = [];

    /** @var string[] */
    private $actions = [];

    /** @var Pattern[] */
    private $pattern = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return PatternRecognizerAnchorType|null
     */
    public function anchor()
    {
        return $this->anchor;
    }

    /**
     * @return bool|null
     */
    public function fuzzy()
    {
        return $this->fuzzy;
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
    public function actions()
    {
        return $this->actions;
    }

    /**
     * @return Pattern[]
     */
    public function pattern()
    {
        return $this->pattern;
    }

    public static function builder(): PatternRecognizerBuilder
    {
        $instance = new self;
        return new class($constructor = function ($anchor, $fuzzy, $gadgetIds, $actions, $pattern) use ($instance): PatternRecognizer {
            $instance->anchor = $anchor;
            $instance->fuzzy = $fuzzy;
            $instance->gadgetIds = $gadgetIds;
            $instance->actions = $actions;
            $instance->pattern = $pattern;
            return $instance;
        }) extends PatternRecognizerBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->anchor = isset($data['anchor']) ? PatternRecognizerAnchorType::fromValue($data['anchor']) : null;
        $instance->fuzzy = isset($data['fuzzy']) ? ((bool) $data['fuzzy']) : null;
        $instance->gadgetIds = [];
        if (isset($data['gadgetIds'])) {
            foreach ($data['gadgetIds'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->gadgetIds[] = $element;
                }
            }
        }
        $instance->actions = [];
        if (isset($data['actions'])) {
            foreach ($data['actions'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->actions[] = $element;
                }
            }
        }
        $instance->pattern = [];
        if (isset($data['pattern'])) {
            foreach ($data['pattern'] as $item) {
                $element = isset($item) ? Pattern::fromValue($item) : null;
                if ($element !== null) {
                    $instance->pattern[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'anchor' => $this->anchor,
            'fuzzy' => $this->fuzzy,
            'gadgetIds' => $this->gadgetIds,
            'actions' => $this->actions,
            'pattern' => $this->pattern
        ]);
    }
}
