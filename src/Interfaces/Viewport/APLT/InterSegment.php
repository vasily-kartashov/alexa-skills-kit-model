<?php

namespace Alexa\Model\Interfaces\Viewport\APLT;

use JsonSerializable;

final class InterSegment implements JsonSerializable
{
    /** @var int|null */
    private $x = null;

    /** @var int|null */
    private $y = null;

    /** @var string|null */
    private $characters = null;

    protected function __construct()
    {
    }

    /**
     * @return int|null
     */
    public function x()
    {
        return $this->x;
    }

    /**
     * @return int|null
     */
    public function y()
    {
        return $this->y;
    }

    /**
     * @return string|null
     */
    public function characters()
    {
        return $this->characters;
    }

    public static function builder(): InterSegmentBuilder
    {
        $instance = new self;
        return new class($constructor = function ($x, $y, $characters) use ($instance): InterSegment {
            $instance->x = $x;
            $instance->y = $y;
            $instance->characters = $characters;
            return $instance;
        }) extends InterSegmentBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->x = isset($data['x']) ? ((int) $data['x']) : null;
        $instance->y = isset($data['y']) ? ((int) $data['y']) : null;
        $instance->characters = isset($data['characters']) ? ((string) $data['characters']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'x' => $this->x,
            'y' => $this->y,
            'characters' => $this->characters
        ]);
    }
}
