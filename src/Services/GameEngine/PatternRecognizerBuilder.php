<?php

namespace Alexa\Model\Services\GameEngine;

abstract class PatternRecognizerBuilder
{
    /** @var callable */
    private $constructor;

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

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param PatternRecognizerAnchorType $anchor
     * @return self
     */
    public function withAnchor(PatternRecognizerAnchorType $anchor): self
    {
        $this->anchor = $anchor;
        return $this;
    }

    /**
     * @param bool $fuzzy
     * @return self
     */
    public function withFuzzy(bool $fuzzy): self
    {
        $this->fuzzy = $fuzzy;
        return $this;
    }

    /**
     * @param array $gadgetIds
     * @return self
     */
    public function withGadgetIds(array $gadgetIds): self
    {
        foreach ($gadgetIds as $element) {
            assert(is_string($element));
        }
        $this->gadgetIds = $gadgetIds;
        return $this;
    }

    /**
     * @param array $actions
     * @return self
     */
    public function withActions(array $actions): self
    {
        foreach ($actions as $element) {
            assert(is_string($element));
        }
        $this->actions = $actions;
        return $this;
    }

    /**
     * @param array $pattern
     * @return self
     */
    public function withPattern(array $pattern): self
    {
        foreach ($pattern as $element) {
            assert($element instanceof Pattern);
        }
        $this->pattern = $pattern;
        return $this;
    }

    public function build(): PatternRecognizer
    {
        return ($this->constructor)(
            $this->anchor,
            $this->fuzzy,
            $this->gadgetIds,
            $this->actions,
            $this->pattern
        );
    }
}
