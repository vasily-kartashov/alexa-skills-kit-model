<?php

namespace Alexa\Model\Interfaces\Viewport;

use \JsonSerializable;

final class Experience implements JsonSerializable
{
    /** @var mixed|null */
    private $arcMinuteWidth = null;

    /** @var mixed|null */
    private $arcMinuteHeight = null;

    /** @var bool|null */
    private $canRotate = null;

    /** @var bool|null */
    private $canResize = null;

    protected function __construct()
    {
    }

    /**
     * @return mixed|null
     */
    public function arcMinuteWidth()
    {
        return $this->arcMinuteWidth;
    }

    /**
     * @return mixed|null
     */
    public function arcMinuteHeight()
    {
        return $this->arcMinuteHeight;
    }

    /**
     * @return bool|null
     */
    public function canRotate()
    {
        return $this->canRotate;
    }

    /**
     * @return bool|null
     */
    public function canResize()
    {
        return $this->canResize;
    }

    public static function builder(): ExperienceBuilder
    {
        $instance = new self;
        $constructor = function ($arcMinuteWidth, $arcMinuteHeight, $canRotate, $canResize) use ($instance): Experience {
            $instance->arcMinuteWidth = $arcMinuteWidth;
            $instance->arcMinuteHeight = $arcMinuteHeight;
            $instance->canRotate = $canRotate;
            $instance->canResize = $canResize;
            return $instance;
        };
        return new class($constructor) extends ExperienceBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param mixed $arcMinuteWidth
     * @return self
     */
    public static function ofArcMinuteWidth($arcMinuteWidth): Experience
    {
        $instance = new self;
        $instance->arcMinuteWidth = $arcMinuteWidth;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->arcMinuteWidth = $data['arcMinuteWidth'];
        $instance->arcMinuteHeight = $data['arcMinuteHeight'];
        $instance->canRotate = isset($data['canRotate']) ? ((bool) $data['canRotate']) : null;
        $instance->canResize = isset($data['canResize']) ? ((bool) $data['canResize']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'arcMinuteWidth' => $this->arcMinuteWidth,
            'arcMinuteHeight' => $this->arcMinuteHeight,
            'canRotate' => $this->canRotate,
            'canResize' => $this->canResize
        ]);
    }
}
