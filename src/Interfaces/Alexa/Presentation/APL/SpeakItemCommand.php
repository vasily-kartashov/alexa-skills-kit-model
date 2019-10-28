<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class SpeakItemCommand extends Command implements JsonSerializable
{
    const TYPE = 'SpeakItem';

    /** @var Align|null */
    private $align = null;

    /** @var string|null */
    private $componentId = null;

    /** @var HighlightMode|null */
    private $highlightMode = null;

    /** @var string|null */
    private $minimumDwellTime = null;

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
     * @return HighlightMode|null
     */
    public function highlightMode()
    {
        return $this->highlightMode;
    }

    /**
     * @return string|null
     */
    public function minimumDwellTime()
    {
        return $this->minimumDwellTime;
    }

    public static function builder(): SpeakItemCommandBuilder
    {
        $instance = new self;
        $constructor = function ($align, $componentId, $highlightMode, $minimumDwellTime) use ($instance): SpeakItemCommand {
            $instance->align = $align;
            $instance->componentId = $componentId;
            $instance->highlightMode = $highlightMode;
            $instance->minimumDwellTime = $minimumDwellTime;
            return $instance;
        };
        return new class($constructor) extends SpeakItemCommandBuilder
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
        $instance->highlightMode = isset($data['highlightMode']) ? HighlightMode::fromValue($data['highlightMode']) : null;
        $instance->minimumDwellTime = isset($data['minimumDwellTime']) ? ((string) $data['minimumDwellTime']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'align' => $this->align,
            'componentId' => $this->componentId,
            'highlightMode' => $this->highlightMode,
            'minimumDwellTime' => $this->minimumDwellTime
        ]);
    }
}
