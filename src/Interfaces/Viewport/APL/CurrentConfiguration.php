<?php

namespace Alexa\Model\Interfaces\Viewport\APL;

use Alexa\Model\Interfaces\Viewport\Mode;
use Alexa\Model\Interfaces\Viewport\Size\ViewportSize;
use Alexa\Model\Interfaces\Viewport\ViewportVideo;
use \JsonSerializable;

final class CurrentConfiguration implements JsonSerializable
{
    /** @var Mode|null */
    private $mode = null;

    /** @var ViewportVideo|null */
    private $video = null;

    /** @var ViewportSize|null */
    private $size = null;

    protected function __construct()
    {
    }

    /**
     * @return Mode|null
     */
    public function mode()
    {
        return $this->mode;
    }

    /**
     * @return ViewportVideo|null
     */
    public function video()
    {
        return $this->video;
    }

    /**
     * @return ViewportSize|null
     */
    public function size()
    {
        return $this->size;
    }

    public static function builder(): CurrentConfigurationBuilder
    {
        $instance = new self;
        $constructor = function ($mode, $video, $size) use ($instance): CurrentConfiguration {
            $instance->mode = $mode;
            $instance->video = $video;
            $instance->size = $size;
            return $instance;
        };
        return new class($constructor) extends CurrentConfigurationBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param Mode $mode
     * @return self
     */
    public static function ofMode(Mode $mode): CurrentConfiguration
    {
        $instance = new self;
        $instance->mode = $mode;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->mode = isset($data['mode']) ? Mode::fromValue($data['mode']) : null;
        $instance->video = isset($data['video']) ? ViewportVideo::fromValue($data['video']) : null;
        $instance->size = isset($data['size']) ? ViewportSize::fromValue($data['size']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'mode' => $this->mode,
            'video' => $this->video,
            'size' => $this->size
        ]);
    }
}
