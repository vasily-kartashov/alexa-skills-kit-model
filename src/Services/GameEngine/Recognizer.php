<?php

namespace Alexa\Model\Services\GameEngine;

use \JsonSerializable;

abstract class Recognizer implements JsonSerializable
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
            case PatternRecognizer::TYPE:
                $instance = PatternRecognizer::fromValue($data);
                break;
            case DeviationRecognizer::TYPE:
                $instance = DeviationRecognizer::fromValue($data);
                break;
            case ProgressRecognizer::TYPE:
                $instance = ProgressRecognizer::fromValue($data);
                break;
        }
        if ($instance !== null) {
        }
        return $instance;
    }
}
