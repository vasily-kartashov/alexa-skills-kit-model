<?php

namespace Alexa\Model\Interfaces\VideoApp;

use Alexa\Model\Directive;
use \JsonSerializable;

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
        $constructor = function ($videoItem) use ($instance): LaunchDirective {
            $instance->videoItem = $videoItem;
            return $instance;
        };
        return new class($constructor) extends LaunchDirectiveBuilder
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
