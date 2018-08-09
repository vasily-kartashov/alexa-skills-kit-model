<?php

namespace Alexa\Model\Services\Directive;

use \JsonSerializable;

abstract class Directive implements JsonSerializable
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

    public static function fromValue(array $data)
    {
        switch ($data['type']) {
            case SpeakDirective::TYPE:
                return SpeakDirective::fromValue($data);
            default:
                return null;
        }
    }
}
