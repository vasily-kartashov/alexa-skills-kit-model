<?php

namespace Alexa\Model;

use Alexa\Model\Interfaces\AudioPlayer\AudioPlayerInterface;
use Alexa\Model\Interfaces\Display\DisplayInterface;
use Alexa\Model\Interfaces\VideoApp\VideoAppInterface;
use \JsonSerializable;

final class SupportedInterfaces implements JsonSerializable
{
    /** @var AudioPlayerInterface|null */
    private $audioPlayer = null;

    /** @var DisplayInterface|null */
    private $display = null;

    /** @var VideoAppInterface|null */
    private $videoApp = null;

    protected function __construct()
    {
    }

    /**
     * @return AudioPlayerInterface|null
     */
    public function audioPlayer()
    {
        return $this->audioPlayer;
    }

    /**
     * @return DisplayInterface|null
     */
    public function display()
    {
        return $this->display;
    }

    /**
     * @return VideoAppInterface|null
     */
    public function videoApp()
    {
        return $this->videoApp;
    }

    public static function builder(): SupportedInterfacesBuilder
    {
        $instance = new self();
        $constructor = function ($audioPlayer, $display, $videoApp) use ($instance): SupportedInterfaces {
            $instance->audioPlayer = $audioPlayer;
            $instance->display = $display;
            $instance->videoApp = $videoApp;
            return $instance;
        };
        return new class($constructor) extends SupportedInterfacesBuilder
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
        $instance = new self();
        $instance->audioPlayer = isset($data['AudioPlayer']) ? AudioPlayerInterface::fromValue($data['AudioPlayer']) : null;
        $instance->display = isset($data['Display']) ? DisplayInterface::fromValue($data['Display']) : null;
        $instance->videoApp = isset($data['VideoApp']) ? VideoAppInterface::fromValue($data['VideoApp']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'AudioPlayer' => $this->audioPlayer,
            'Display' => $this->display,
            'VideoApp' => $this->videoApp
        ]);
    }
}
