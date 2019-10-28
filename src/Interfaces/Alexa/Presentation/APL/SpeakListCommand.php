<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class SpeakListCommand extends Command implements JsonSerializable
{
    const TYPE = 'SpeakList';

    /** @var Align|null */
    private $align = null;

    /** @var string|null */
    private $componentId = null;

    /** @var string|null */
    private $count = null;

    /** @var string|null */
    private $minimumDwellTime = null;

    /** @var string|null */
    private $start = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return Align|null
     */
    public function align()
    {
        return $this->align;
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
    public function minimumDwellTime()
    {
        return $this->minimumDwellTime;
    }

    /**
     * @return string|null
     */
    public function start()
    {
        return $this->start;
    }

    public static function builder(): SpeakListCommandBuilder
    {
        $instance = new self;
        $constructor = function ($align, $componentId, $count, $minimumDwellTime, $start) use ($instance): SpeakListCommand {
            $instance->align = $align;
            $instance->componentId = $componentId;
            $instance->count = $count;
            $instance->minimumDwellTime = $minimumDwellTime;
            $instance->start = $start;
            return $instance;
        };
        return new class($constructor) extends SpeakListCommandBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->align = isset($data['align']) ? Align::fromValue($data['align']) : null;
        $instance->componentId = isset($data['componentId']) ? ((string) $data['componentId']) : null;
        $instance->count = isset($data['count']) ? ((string) $data['count']) : null;
        $instance->minimumDwellTime = isset($data['minimumDwellTime']) ? ((string) $data['minimumDwellTime']) : null;
        $instance->start = isset($data['start']) ? ((string) $data['start']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'align' => $this->align,
            'componentId' => $this->componentId,
            'count' => $this->count,
            'minimumDwellTime' => $this->minimumDwellTime,
            'start' => $this->start
        ]);
    }
}
