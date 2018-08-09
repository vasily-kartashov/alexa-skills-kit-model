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

    public static function fromValue(array $data)
    {
        switch ($data['type']) {
            case ProgressRecognizer::TYPE:
                return ProgressRecognizer::fromValue($data);
            case PatternRecognizer::TYPE:
                return PatternRecognizer::fromValue($data);
            case DeviationRecognizer::TYPE:
                return DeviationRecognizer::fromValue($data);
            default:
                return null;
        }
    }
}
