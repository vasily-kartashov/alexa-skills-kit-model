<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class ScaleTransformProperty extends TransformProperty implements JsonSerializable
{
    /** @var string|null */
    private $scale = null;

    /** @var string|null */
    private $scaleX = null;

    /** @var string|null */
    private $scaleY = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function scale()
    {
        return $this->scale;
    }

    /**
     * @return string|null
     */
    public function scaleX()
    {
        return $this->scaleX;
    }

    /**
     * @return string|null
     */
    public function scaleY()
    {
        return $this->scaleY;
    }

    public static function builder(): ScaleTransformPropertyBuilder
    {
        $instance = new self();
        $constructor = function ($scale, $scaleX, $scaleY) use ($instance): ScaleTransformProperty {
            $instance->scale = $scale;
            $instance->scaleX = $scaleX;
            $instance->scaleY = $scaleY;
            return $instance;
        };
        return new class($constructor) extends ScaleTransformPropertyBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->scale = isset($data['scale']) ? ((string) $data['scale']) : null;
        $instance->scaleX = isset($data['scaleX']) ? ((string) $data['scaleX']) : null;
        $instance->scaleY = isset($data['scaleY']) ? ((string) $data['scaleY']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'scale' => $this->scale,
            'scaleX' => $this->scaleX,
            'scaleY' => $this->scaleY
        ]);
    }
}
