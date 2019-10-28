<?php

namespace Alexa\Model\Services\GadgetController;

use \JsonSerializable;

final class SetLightParameters implements JsonSerializable
{
    /** @var TriggerEventType|null */
    private $triggerEvent = null;

    /** @var int|null */
    private $triggerEventTimeMs = null;

    /** @var LightAnimation[] */
    private $animations = [];

    protected function __construct()
    {
    }

    /**
     * @return TriggerEventType|null
     */
    public function triggerEvent()
    {
        return $this->triggerEvent;
    }

    /**
     * @return int|null
     */
    public function triggerEventTimeMs()
    {
        return $this->triggerEventTimeMs;
    }

    /**
     * @return LightAnimation[]
     */
    public function animations()
    {
        return $this->animations;
    }

    public static function builder(): SetLightParametersBuilder
    {
        $instance = new self;
        $constructor = function ($triggerEvent, $triggerEventTimeMs, $animations) use ($instance): SetLightParameters {
            $instance->triggerEvent = $triggerEvent;
            $instance->triggerEventTimeMs = $triggerEventTimeMs;
            $instance->animations = $animations;
            return $instance;
        };
        return new class($constructor) extends SetLightParametersBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param TriggerEventType $triggerEvent
     * @return self
     */
    public static function ofTriggerEvent(TriggerEventType $triggerEvent): SetLightParameters
    {
        $instance = new self;
        $instance->triggerEvent = $triggerEvent;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->triggerEvent = isset($data['triggerEvent']) ? TriggerEventType::fromValue($data['triggerEvent']) : null;
        $instance->triggerEventTimeMs = isset($data['triggerEventTimeMs']) ? ((int) $data['triggerEventTimeMs']) : null;
        $instance->animations = [];
        if (isset($data['animations'])) {
            foreach ($data['animations'] as $item) {
                $element = isset($item) ? LightAnimation::fromValue($item) : null;
                if ($element !== null) {
                    $instance->animations[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'triggerEvent' => $this->triggerEvent,
            'triggerEventTimeMs' => $this->triggerEventTimeMs,
            'animations' => $this->animations
        ]);
    }
}
