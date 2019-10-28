<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

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
    protected $screenLock = null;

    /** @var string|null */
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
    public function screenLock()
    {
        return $this->screenLock;
    }

    /**
     * @return string|null
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
            case SetValueCommand::TYPE:
                $instance = SetValueCommand::fromValue($data);
                break;
            case IdleCommand::TYPE:
                $instance = IdleCommand::fromValue($data);
                break;
            case AutoPageCommand::TYPE:
                $instance = AutoPageCommand::fromValue($data);
                break;
            case ScrollCommand::TYPE:
                $instance = ScrollCommand::fromValue($data);
                break;
            case SendEventCommand::TYPE:
                $instance = SendEventCommand::fromValue($data);
                break;
            case ParallelCommand::TYPE:
                $instance = ParallelCommand::fromValue($data);
                break;
            case SetPageCommand::TYPE:
                $instance = SetPageCommand::fromValue($data);
                break;
            case SequentialCommand::TYPE:
                $instance = SequentialCommand::fromValue($data);
                break;
        }
        if ($instance !== null) {
            if (isset($data['delay'])) {
                $instance->delay = $data['delay'];
            }
            if (isset($data['description'])) {
                $instance->description = $data['description'];
            }
            if (isset($data['screenLock'])) {
                $instance->screenLock = $data['screenLock'];
            }
            if (isset($data['when'])) {
                $instance->when = $data['when'];
            }
        }
        return $instance;
    }
}
