<?php

namespace Alexa\Model;

use \JsonSerializable;

abstract class Cause implements JsonSerializable
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
            case ConnectionCompleted::TYPE:
                $instance = ConnectionCompleted::fromValue($data);
                break;
        }
        return $instance;
    }
}
