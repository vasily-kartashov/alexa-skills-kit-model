<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

abstract class AnimatedProperty implements JsonSerializable
{
    /** @var string|null */
    protected $property = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function property()
    {
        return $this->property;
    }

    /**
     * @param array $data
     * @return self|null
     */
    public static function fromValue(array $data)
    {
        if (!isset($data['property'])) {
            return null;
        }
        $instance = null;
        switch ($data['property']) {
            case AnimatedOpacityProperty::PROPERTY:
                $instance = AnimatedOpacityProperty::fromValue($data);
                break;
            case AnimatedTransformProperty::PROPERTY:
                $instance = AnimatedTransformProperty::fromValue($data);
                break;
        }
        return $instance;
    }
}
