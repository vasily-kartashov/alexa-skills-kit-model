<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class RotateTransformProperty extends TransformProperty implements JsonSerializable
{
    /** @var string|null */
    private $rotate = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function rotate()
    {
        return $this->rotate;
    }

    public static function builder(): RotateTransformPropertyBuilder
    {
        $instance = new self;
        return new class($constructor = function ($rotate) use ($instance): RotateTransformProperty {
            $instance->rotate = $rotate;
            return $instance;
        }) extends RotateTransformPropertyBuilder {};
    }

    /**
     * @param string $rotate
     * @return self
     */
    public static function ofRotate(string $rotate): RotateTransformProperty
    {
        $instance = new self;
        $instance->rotate = $rotate;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->rotate = isset($data['rotate']) ? ((string) $data['rotate']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'rotate' => $this->rotate
        ]);
    }
}
