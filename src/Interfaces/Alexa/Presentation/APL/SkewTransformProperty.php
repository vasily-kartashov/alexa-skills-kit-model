<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class SkewTransformProperty extends TransformProperty implements JsonSerializable
{
    /** @var string|null */
    private $skewX = null;

    /** @var string|null */
    private $skewY = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function skewX()
    {
        return $this->skewX;
    }

    /**
     * @return string|null
     */
    public function skewY()
    {
        return $this->skewY;
    }

    public static function builder(): SkewTransformPropertyBuilder
    {
        $instance = new self;
        $constructor = function ($skewX, $skewY) use ($instance): SkewTransformProperty {
            $instance->skewX = $skewX;
            $instance->skewY = $skewY;
            return $instance;
        };
        return new class($constructor) extends SkewTransformPropertyBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param string $skewX
     * @return self
     */
    public static function ofSkewX(string $skewX): SkewTransformProperty
    {
        $instance = new self;
        $instance->skewX = $skewX;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->skewX = isset($data['skewX']) ? ((string) $data['skewX']) : null;
        $instance->skewY = isset($data['skewY']) ? ((string) $data['skewY']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'skewX' => $this->skewX,
            'skewY' => $this->skewY
        ]);
    }
}
