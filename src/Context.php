<?php

namespace Alexa\Model;

use Alexa\Model\Interfaces\AudioPlayer\AudioPlayerState;
use Alexa\Model\Interfaces\Display\DisplayState;
use Alexa\Model\Interfaces\Geolocation\GeolocationState;
use Alexa\Model\Interfaces\System\SystemState;
use Alexa\Model\Interfaces\Viewport\ViewportState;
use \JsonSerializable;

final class Context implements JsonSerializable
{
    /** @var SystemState|null */
    private $system = null;

    /** @var AudioPlayerState|null */
    private $audioPlayer = null;

    /** @var DisplayState|null */
    private $display = null;

    /** @var GeolocationState|null */
    private $geolocation = null;

    /** @var ViewportState|null */
    private $viewport = null;

    protected function __construct()
    {
    }

    /**
     * @return SystemState|null
     */
    public function system()
    {
        return $this->system;
    }

    /**
     * @return AudioPlayerState|null
     */
    public function audioPlayer()
    {
        return $this->audioPlayer;
    }

    /**
     * @return DisplayState|null
     */
    public function display()
    {
        return $this->display;
    }

    /**
     * @return GeolocationState|null
     */
    public function geolocation()
    {
        return $this->geolocation;
    }

    /**
     * @return ViewportState|null
     */
    public function viewport()
    {
        return $this->viewport;
    }

    public static function builder(): ContextBuilder
    {
        $instance = new self();
        $constructor = function ($system, $audioPlayer, $display, $geolocation, $viewport) use ($instance): Context {
            $instance->system = $system;
            $instance->audioPlayer = $audioPlayer;
            $instance->display = $display;
            $instance->geolocation = $geolocation;
            $instance->viewport = $viewport;
            return $instance;
        };
        return new class($constructor) extends ContextBuilder
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
        $instance->system = isset($data['System']) ? SystemState::fromValue($data['System']) : null;
        $instance->audioPlayer = isset($data['AudioPlayer']) ? AudioPlayerState::fromValue($data['AudioPlayer']) : null;
        $instance->display = isset($data['Display']) ? DisplayState::fromValue($data['Display']) : null;
        $instance->geolocation = isset($data['Geolocation']) ? GeolocationState::fromValue($data['Geolocation']) : null;
        $instance->viewport = isset($data['Viewport']) ? ViewportState::fromValue($data['Viewport']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'System' => $this->system,
            'AudioPlayer' => $this->audioPlayer,
            'Display' => $this->display,
            'Geolocation' => $this->geolocation,
            'Viewport' => $this->viewport
        ]);
    }
}
