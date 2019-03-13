<?php

namespace Alexa\Model;

use Alexa\Model\Interfaces\AudioPlayer\AudioPlayerState;
use Alexa\Model\Interfaces\Display\DisplayState;
use Alexa\Model\Interfaces\Geolocation\GeolocationState;
use Alexa\Model\Interfaces\System\SystemState;
use Alexa\Model\Interfaces\Viewport\ViewportState;

abstract class ContextBuilder
{
    /** @var callable */
    private $constructor;

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

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param SystemState $system
     * @return self
     */
    public function withSystem(SystemState $system): self
    {
        $this->system = $system;
        return $this;
    }

    /**
     * @param AudioPlayerState $audioPlayer
     * @return self
     */
    public function withAudioPlayer(AudioPlayerState $audioPlayer): self
    {
        $this->audioPlayer = $audioPlayer;
        return $this;
    }

    /**
     * @param DisplayState $display
     * @return self
     */
    public function withDisplay(DisplayState $display): self
    {
        $this->display = $display;
        return $this;
    }

    /**
     * @param GeolocationState $geolocation
     * @return self
     */
    public function withGeolocation(GeolocationState $geolocation): self
    {
        $this->geolocation = $geolocation;
        return $this;
    }

    /**
     * @param ViewportState $viewport
     * @return self
     */
    public function withViewport(ViewportState $viewport): self
    {
        $this->viewport = $viewport;
        return $this;
    }

    public function build(): Context
    {
        return ($this->constructor)(
            $this->system,
            $this->audioPlayer,
            $this->display,
            $this->geolocation,
            $this->viewport
        );
    }
}
