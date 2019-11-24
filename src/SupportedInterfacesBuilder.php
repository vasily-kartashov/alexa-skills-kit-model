<?php

namespace Alexa\Model;

use Alexa\Model\Interfaces\Alexa\Presentation\APLT\AlexaPresentationApltInterface;
use Alexa\Model\Interfaces\Alexa\Presentation\APL\AlexaPresentationAplInterface;
use Alexa\Model\Interfaces\Alexa\Presentation\Html\AlexaPresentationHtmlInterface;
use Alexa\Model\Interfaces\AudioPlayer\AudioPlayerInterface;
use Alexa\Model\Interfaces\Display\DisplayInterface;
use Alexa\Model\Interfaces\Geolocation\GeolocationInterface;
use Alexa\Model\Interfaces\Navigation\NavigationInterface;
use Alexa\Model\Interfaces\VideoApp\VideoAppInterface;

abstract class SupportedInterfacesBuilder
{
    /** @var callable */
    private $constructor;

    /** @var AlexaPresentationAplInterface|null */
    private $alexaPresentationAPL = null;

    /** @var AlexaPresentationApltInterface|null */
    private $alexaPresentationAPLT = null;

    /** @var AlexaPresentationHtmlInterface|null */
    private $alexaPresentationHTML = null;

    /** @var AudioPlayerInterface|null */
    private $audioPlayer = null;

    /** @var DisplayInterface|null */
    private $display = null;

    /** @var VideoAppInterface|null */
    private $videoApp = null;

    /** @var GeolocationInterface|null */
    private $geolocation = null;

    /** @var NavigationInterface|null */
    private $navigation = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param AlexaPresentationAplInterface $alexaPresentationAPL
     * @return self
     */
    public function withAlexaPresentationAPL(AlexaPresentationAplInterface $alexaPresentationAPL): self
    {
        $this->alexaPresentationAPL = $alexaPresentationAPL;
        return $this;
    }

    /**
     * @param AlexaPresentationApltInterface $alexaPresentationAPLT
     * @return self
     */
    public function withAlexaPresentationAPLT(AlexaPresentationApltInterface $alexaPresentationAPLT): self
    {
        $this->alexaPresentationAPLT = $alexaPresentationAPLT;
        return $this;
    }

    /**
     * @param AlexaPresentationHtmlInterface $alexaPresentationHTML
     * @return self
     */
    public function withAlexaPresentationHTML(AlexaPresentationHtmlInterface $alexaPresentationHTML): self
    {
        $this->alexaPresentationHTML = $alexaPresentationHTML;
        return $this;
    }

    /**
     * @param AudioPlayerInterface $audioPlayer
     * @return self
     */
    public function withAudioPlayer(AudioPlayerInterface $audioPlayer): self
    {
        $this->audioPlayer = $audioPlayer;
        return $this;
    }

    /**
     * @param DisplayInterface $display
     * @return self
     */
    public function withDisplay(DisplayInterface $display): self
    {
        $this->display = $display;
        return $this;
    }

    /**
     * @param VideoAppInterface $videoApp
     * @return self
     */
    public function withVideoApp(VideoAppInterface $videoApp): self
    {
        $this->videoApp = $videoApp;
        return $this;
    }

    /**
     * @param GeolocationInterface $geolocation
     * @return self
     */
    public function withGeolocation(GeolocationInterface $geolocation): self
    {
        $this->geolocation = $geolocation;
        return $this;
    }

    /**
     * @param NavigationInterface $navigation
     * @return self
     */
    public function withNavigation(NavigationInterface $navigation): self
    {
        $this->navigation = $navigation;
        return $this;
    }

    public function build(): SupportedInterfaces
    {
        return ($this->constructor)(
            $this->alexaPresentationAPL,
            $this->alexaPresentationAPLT,
            $this->alexaPresentationHTML,
            $this->audioPlayer,
            $this->display,
            $this->videoApp,
            $this->geolocation,
            $this->navigation
        );
    }
}
