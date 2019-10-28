<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class PlayMediaCommand extends Command implements JsonSerializable
{
    const TYPE = 'PlayMedia';

    /** @var AudioTrack|null */
    private $audioTrack = null;

    /** @var string|null */
    private $componentId = null;

    /** @var VideoSource[] */
    private $source = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return AudioTrack|null
     */
    public function audioTrack()
    {
        return $this->audioTrack;
    }

    /**
     * @return string|null
     */
    public function componentId()
    {
        return $this->componentId;
    }

    /**
     * @return VideoSource[]
     */
    public function source()
    {
        return $this->source;
    }

    public static function builder(): PlayMediaCommandBuilder
    {
        $instance = new self;
        $constructor = function ($audioTrack, $componentId, $source) use ($instance): PlayMediaCommand {
            $instance->audioTrack = $audioTrack;
            $instance->componentId = $componentId;
            $instance->source = $source;
            return $instance;
        };
        return new class($constructor) extends PlayMediaCommandBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param AudioTrack $audioTrack
     * @return self
     */
    public static function ofAudioTrack(AudioTrack $audioTrack): PlayMediaCommand
    {
        $instance = new self;
        $instance->audioTrack = $audioTrack;
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
        $instance->audioTrack = isset($data['audioTrack']) ? AudioTrack::fromValue($data['audioTrack']) : null;
        $instance->componentId = isset($data['componentId']) ? ((string) $data['componentId']) : null;
        $instance->source = [];
        if (isset($data['source'])) {
            foreach ($data['source'] as $item) {
                $element = isset($item) ? VideoSource::fromValue($item) : null;
                if ($element !== null) {
                    $instance->source[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'audioTrack' => $this->audioTrack,
            'componentId' => $this->componentId,
            'source' => $this->source
        ]);
    }
}
