<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class MoveTransformProperty extends TransformProperty implements JsonSerializable
{
    /** @var string|null */
    private $translateX = null;

    /** @var string|null */
    private $translateY = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function translateX()
    {
        return $this->translateX;
    }

    /**
     * @return string|null
     */
    public function translateY()
    {
        return $this->translateY;
    }

    public static function builder(): MoveTransformPropertyBuilder
    {
        $instance = new self;
        $constructor = function ($translateX, $translateY) use ($instance): MoveTransformProperty {
            $instance->translateX = $translateX;
            $instance->translateY = $translateY;
            return $instance;
        };
        return new class($constructor) extends MoveTransformPropertyBuilder
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
        $instance = new self;
        $instance->translateX = isset($data['translateX']) ? ((string) $data['translateX']) : null;
        $instance->translateY = isset($data['translateY']) ? ((string) $data['translateY']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'translateX' => $this->translateX,
            'translateY' => $this->translateY
        ]);
    }
}
