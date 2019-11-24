<?php

namespace Alexa\Model\Interfaces\VideoApp;

use Alexa\Model\Directive;
use JsonSerializable;

final class LaunchDirective extends Directive implements JsonSerializable
{
    const TYPE = 'VideoApp.Launch';

    /** @var VideoItem|null */
    private $videoItem = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return VideoItem|null
     */
    public function videoItem()
    {
        return $this->videoItem;
    }

    public static function builder(): LaunchDirectiveBuilder
    {
        $instance = new self;
        return new class($constructor = function ($videoItem) use ($instance): LaunchDirective {
            $instance->videoItem = $videoItem;
            return $instance;
        }) extends LaunchDirectiveBuilder {};
    }

    /**
     * @param VideoItem $videoItem
     * @return self
     */
    public static function ofVideoItem(VideoItem $videoItem): LaunchDirective
    {
        $instance = new self;
        $instance->videoItem = $videoItem;
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
        $instance->videoItem = isset($data['videoItem']) ? VideoItem::fromValue($data['videoItem']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'videoItem' => $this->videoItem
        ]);
    }
}
