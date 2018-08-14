<?php

namespace Alexa\Model\Interfaces\Display;

use \JsonSerializable;

abstract class Hint implements JsonSerializable
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
        switch ($data['type']) {
            case PlainTextHint::TYPE:
                return PlainTextHint::fromValue($data);
            default:
                return null;
        }
    }
}
