<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class AnimateItemCommand extends Command implements JsonSerializable
{
    const TYPE = 'AnimateItem';

    /** @var string|null */
    private $componentId = null;

    /** @var string|null */
    private $duration = null;

    /** @var string|null */
    private $easing = null;

    /** @var string|null */
    private $repeatCount = null;

    /** @var AnimateItemRepeatMode|null */
    private $repeatMode = null;

    /** @var AnimatedProperty[] */
    private $value = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function componentId()
    {
        return $this->componentId;
    }

    /**
     * @return string|null
     */
    public function duration()
    {
        return $this->duration;
    }

    /**
     * @return string|null
     */
    public function easing()
    {
        return $this->easing;
    }

    /**
     * @return string|null
     */
    public function repeatCount()
    {
        return $this->repeatCount;
    }

    /**
     * @return AnimateItemRepeatMode|null
     */
    public function repeatMode()
    {
        return $this->repeatMode;
    }

    /**
     * @return AnimatedProperty[]
     */
    public function value()
    {
        return $this->value;
    }

    public static function builder(): AnimateItemCommandBuilder
    {
        $instance = new self;
        return new class($constructor = function ($componentId, $duration, $easing, $repeatCount, $repeatMode, $value) use ($instance): AnimateItemCommand {
            $instance->componentId = $componentId;
            $instance->duration = $duration;
            $instance->easing = $easing;
            $instance->repeatCount = $repeatCount;
            $instance->repeatMode = $repeatMode;
            $instance->value = $value;
            return $instance;
        }) extends AnimateItemCommandBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->componentId = isset($data['componentId']) ? ((string) $data['componentId']) : null;
        $instance->duration = isset($data['duration']) ? ((string) $data['duration']) : null;
        $instance->easing = isset($data['easing']) ? ((string) $data['easing']) : null;
        $instance->repeatCount = isset($data['repeatCount']) ? ((string) $data['repeatCount']) : null;
        $instance->repeatMode = isset($data['repeatMode']) ? AnimateItemRepeatMode::fromValue($data['repeatMode']) : null;
        $instance->value = [];
        if (isset($data['value'])) {
            foreach ($data['value'] as $item) {
                $element = isset($item) ? AnimatedProperty::fromValue($item) : null;
                if ($element !== null) {
                    $instance->value[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'componentId' => $this->componentId,
            'duration' => $this->duration,
            'easing' => $this->easing,
            'repeatCount' => $this->repeatCount,
            'repeatMode' => $this->repeatMode,
            'value' => $this->value
        ]);
    }
}
