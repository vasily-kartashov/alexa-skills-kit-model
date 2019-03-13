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
            case SpeakDirective::TYPE:
                $instance = SpeakDirective::fromValue($data);
                break;
        }
        if ($instance !== null) {
        }
        return $instance;
    }
}
