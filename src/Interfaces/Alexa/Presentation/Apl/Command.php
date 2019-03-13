<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Apl;

use \JsonSerializable;

abstract class Command implements JsonSerializable
{
    /** @var string|null */
    protected $type = null;

    /** @var int|null */
    protected $delay = null;

    /** @var string|null */
    protected $description = null;

    /** @var bool|null */
    protected $when = null;

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
     * @return int|null
     */
    public function delay()
    {
        return $this->delay;
    }

    /**
     * @return string|null
     */
    public function description()
    {
        return $this->description;
    }

    /**
     * @return bool|null
     */
    public function when()
    {
        return $this->when;
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
            case SetPageCommand::TYPE:
                $instance = SetPageCommand::fromValue($data);
                break;
            case SpeakItemCommand::TYPE:
                $instance = SpeakItemCommand::fromValue($data);
                break;
            case AutoPageCommand::TYPE:
                $instance = AutoPageCommand::fromValue($data);
                break;
        }
        if ($instance !== null) {
            if (isset($data['delay'])) {
                $instance->delay = $data['delay'];
            }
            if (isset($data['description'])) {
                $instance->description = $data['description'];
            }
            if (isset($data['when'])) {
                $instance->when = $data['when'];
            }
        }
        return $instance;
    }
}
