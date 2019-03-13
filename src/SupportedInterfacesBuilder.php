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
    private $alexa.Presentation.APL = null;

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

    public function withAlexa.Presentation.APL(AlexaPresentationAplInterface $alexa.Presentation.APL): self
    {
        $this->alexa.Presentation.APL = $alexa.Presentation.APL;
        return $this;
    }

    public function withAudioPlayer(AudioPlayerInterface $audioPlayer): self
    {
        $this->audioPlayer = $audioPlayer;
        return $this;
    }

    public function withDisplay(DisplayInterface $display): self
    {
        $this->display = $display;
        return $this;
    }

    public function withVideoApp(VideoAppInterface $videoApp): self
    {
        $this->videoApp = $videoApp;
        return $this;
    }

    public function withGeolocation(GeolocationInterface $geolocation): self
    {
        $this->geolocation = $geolocation;
        return $this;
    }

    public function build(): SupportedInterfaces
    {
        return ($this->constructor)(
            $this->alexa.Presentation.APL,
            $this->audioPlayer,
            $this->display,
            $this->videoApp,
            $this->geolocation
        );
    }
}
