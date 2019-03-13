<?php

namespace Alexa\Model;

use Alexa\Model\Interfaces\Alexa\Presentation\Apl\AlexaPresentationAplInterface;
use Alexa\Model\Interfaces\AudioPlayer\AudioPlayerInterface;
use Alexa\Model\Interfaces\Display\DisplayInterface;
use Alexa\Model\Interfaces\Geolocation\GeolocationInterface;
use Alexa\Model\Interfaces\VideoApp\VideoAppInterface;

abstract class SupportedInterfacesBuilder
{
    /** @var callable */
    private $constructor;

    /** @var AlexaPresentationAplInterface|null */
    private $alexaPresentationAPL = null;

    /** @var AudioPlayerInterface|null */
    private $audioPlayer = null;

    /** @var DisplayInterface|null */
    private $display = null;

    /** @var VideoAppInterface|null */
    private $videoApp = null;

    /** @var GeolocationInterface|null */
    private $geolocation = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $alexaPresentationAPL
     * @return self
     */
    public function withAlexaPresentationAPL(AlexaPresentationAplInterface $alexaPresentationAPL): self
    {
        $this->alexaPresentationAPL = $alexaPresentationAPL;
        return $this;
    }

    /**
     * @param mixed $audioPlayer
     * @return self
     */
    public function withAudioPlayer(AudioPlayerInterface $audioPlayer): self
    {
        $this->audioPlayer = $audioPlayer;
        return $this;
    }

    /**
     * @param mixed $display
     * @return self
     */
    public function withDisplay(DisplayInterface $display): self
    {
        $this->display = $display;
        return $this;
    }

    /**
     * @param mixed $videoApp
     * @return self
     */
    public function withVideoApp(VideoAppInterface $videoApp): self
    {
        $this->videoApp = $videoApp;
        return $this;
    }

    /**
     * @param mixed $geolocation
     * @return self
     */
    public function withGeolocation(GeolocationInterface $geolocation): self
    {
        $this->geolocation = $geolocation;
        return $this;
    }

    public function build(): SupportedInterfaces
    {
        return ($this->constructor)(
            $this->alexaPresentationAPL,
            $this->audioPlayer,
            $this->display,
            $this->videoApp,
            $this->geolocation
        );
    }
}
