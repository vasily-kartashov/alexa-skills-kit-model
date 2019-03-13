<?php

namespace Alexa\Model\Interfaces\Connections\Entities;

use \JsonSerializable;

abstract class BaseEntity implements JsonSerializable
{
    /** @var string|null */
    protected $type = null;

    /** @var string|null */
    protected $@version = null;

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
     * @return string|null
     */
    public function @version()
    {
        return $this->@version;
    }

    /**
     * @param array $data
     * @return self|null
     */
    public static function fromValue(array $data)
    {
        if (!isset($data['@type'])) {
            return null;
        }
        switch ($data['@type']) {
            case Restaurant::@TYPE:
                return Restaurant::fromValue($data);
            case PostalAddress::@TYPE:
                return PostalAddress::fromValue($data);
            default:
                return null;
        }
    }
}
