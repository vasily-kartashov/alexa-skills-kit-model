<?php

namespace Alexa\Model\Interfaces\Display;

use \JsonSerializable;

abstract class TextField implements JsonSerializable
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
            case RichText::TYPE:
                return RichText::fromValue($data);
            case PlainText::TYPE:
                return PlainText::fromValue($data);
            default:
                return null;
        }
    }
}
