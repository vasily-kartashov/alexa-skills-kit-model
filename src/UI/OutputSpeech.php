<?php

namespace Alexa\Model\UI;

use \JsonSerializable;

abstract class OutputSpeech implements JsonSerializable
{
    /** @var string|null */
    protected $type = null;

    /** @var PlayBehavior|null */
    protected $playBehavior = null;

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
     * @return PlayBehavior|null
     */
    public function playBehavior()
    {
        return $this->playBehavior;
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
            case SsmlOutputSpeech::TYPE:
                return SsmlOutputSpeech::fromValue($data);
            case PlainTextOutputSpeech::TYPE:
                return PlainTextOutputSpeech::fromValue($data);
            default:
                return null;
        }
    }
}
