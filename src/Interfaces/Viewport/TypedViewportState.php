<?php

namespace Alexa\Model\Interfaces\Viewport;

use \JsonSerializable;

abstract class TypedViewportState implements JsonSerializable
{
    /** @var string|null */
    protected $id = null;

    /** @var string|null */
    protected $type = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function id()
    {
        return $this->id;
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
            case APLViewportState::TYPE:
                $instance = APLViewportState::fromValue($data);
                break;
            case APLTViewportState::TYPE:
                $instance = APLTViewportState::fromValue($data);
                break;
        }
        if ($instance !== null) {
            if (isset($data['id'])) {
                $instance->id = $data['id'];
            }
        }
        return $instance;
    }
}
