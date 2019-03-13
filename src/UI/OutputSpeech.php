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
        $instance = null;
        switch ($data['type']) {
            case SsmlOutputSpeech::TYPE:
                $instance = SsmlOutputSpeech::fromValue($data);
                break;
            case PlainTextOutputSpeech::TYPE:
                $instance = PlainTextOutputSpeech::fromValue($data);
                break;
        }
        if ($instance !== null) {
            $instance->playBehavior = $data['playBehavior'];
        }
        return $instance;
    }
}
