<?php

namespace Alexa\Model\Interfaces\Viewport\Size;

use \JsonSerializable;

abstract class ViewportSize implements JsonSerializable
{
    /** @var string|null */
    protected $type = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @param array $data
     * @return self|null
     */
    public static function fromValue(array $data)
    {
        if (!isset($data['type'])) {
            return null;
        }
        $instance = null;
        switch ($data['type']) {
            case ContinuousViewportSize::TYPE:
                $instance = ContinuousViewportSize::fromValue($data);
                break;
            case DiscreteViewportSize::TYPE:
                $instance = DiscreteViewportSize::fromValue($data);
                break;
        }
        if ($instance !== null) {
        }
        return $instance;
    }
}
