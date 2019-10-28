<?php

namespace Alexa\Model\Services\GadgetController;

use \JsonSerializable;

final class AnimationStep implements JsonSerializable
{
    /** @var int|null */
    private $durationMs = null;

    /** @var string|null */
    private $color = null;

    /** @var bool|null */
    private $blend = null;

    protected function __construct()
    {
    }

    /**
     * @return int|null
     */
    public function durationMs()
    {
        return $this->durationMs;
    }

    /**
     * @return string|null
     */
    public function color()
    {
        return $this->color;
    }

    /**
     * @return bool|null
     */
    public function blend()
    {
        return $this->blend;
    }

    public static function builder(): AnimationStepBuilder
    {
        $instance = new self;
        $constructor = function ($durationMs, $color, $blend) use ($instance): AnimationStep {
            $instance->durationMs = $durationMs;
            $instance->color = $color;
            $instance->blend = $blend;
            return $instance;
        };
        return new class($constructor) extends AnimationStepBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param int $durationMs
     * @return self
     */
    public static function ofDurationMs(int $durationMs): AnimationStep
    {
        $instance = new self;
        $instance->durationMs = $durationMs;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->durationMs = isset($data['durationMs']) ? ((int) $data['durationMs']) : null;
        $instance->color = isset($data['color']) ? ((string) $data['color']) : null;
        $instance->blend = isset($data['blend']) ? ((bool) $data['blend']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'durationMs' => $this->durationMs,
            'color' => $this->color,
            'blend' => $this->blend
        ]);
    }
}
