<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class AutoPageCommand extends Command implements JsonSerializable
{
    const TYPE = 'AutoPage';

    /** @var string|null */
    private $componentId = null;

    /** @var string|null */
    private $count = null;

    /** @var string|null */
    private $duration = null;

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
    public function count()
    {
        return $this->count;
    }

    /**
     * @return string|null
     */
    public function duration()
    {
        return $this->duration;
    }

    public static function builder(): AutoPageCommandBuilder
    {
        $instance = new self;
        return new class($constructor = function ($componentId, $count, $duration) use ($instance): AutoPageCommand {
            $instance->componentId = $componentId;
            $instance->count = $count;
            $instance->duration = $duration;
            return $instance;
        }) extends AutoPageCommandBuilder {};
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
        $instance->count = isset($data['count']) ? ((string) $data['count']) : null;
        $instance->duration = isset($data['duration']) ? ((string) $data['duration']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'componentId' => $this->componentId,
            'count' => $this->count,
            'duration' => $this->duration
        ]);
    }
}
