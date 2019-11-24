<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

use JsonSerializable;

final class ScrollCommand extends Command implements JsonSerializable
{
    const TYPE = 'Scroll';

    /** @var string|null */
    private $distance = null;

    /** @var string|null */
    private $componentId = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function distance()
    {
        return $this->distance;
    }

    /**
     * @return string|null
     */
    public function componentId()
    {
        return $this->componentId;
    }

    public static function builder(): ScrollCommandBuilder
    {
        $instance = new self;
        return new class($constructor = function ($distance, $componentId) use ($instance): ScrollCommand {
            $instance->distance = $distance;
            $instance->componentId = $componentId;
            return $instance;
        }) extends ScrollCommandBuilder {};
    }

    /**
     * @param string $distance
     * @return self
     */
    public static function ofDistance(string $distance): ScrollCommand
    {
        $instance = new self;
        $instance->distance = $distance;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->distance = isset($data['distance']) ? ((string) $data['distance']) : null;
        $instance->componentId = isset($data['componentId']) ? ((string) $data['componentId']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'distance' => $this->distance,
            'componentId' => $this->componentId
        ]);
    }
}
