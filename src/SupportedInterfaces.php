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
use JsonSerializable;

final class SupportedInterfaces implements JsonSerializable
{
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

    protected function __construct()
    {
    }

    /**
     * @return AlexaPresentationAplInterface|null
     */
    public function alexaPresentationAPL()
    {
        return $this->alexaPresentationAPL;
    }

    /**
     * @return AlexaPresentationApltInterface|null
     */
    public function alexaPresentationAPLT()
    {
        return $this->alexaPresentationAPLT;
    }

    /**
     * @return AlexaPresentationHtmlInterface|null
     */
    public function alexaPresentationHTML()
    {
        return $this->alexaPresentationHTML;
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

    /**
     * @return GeolocationInterface|null
     */
    public function geolocation()
    {
        return $this->geolocation;
    }

    /**
     * @return NavigationInterface|null
     */
    public function navigation()
    {
        return $this->navigation;
    }

    public static function builder(): SupportedInterfacesBuilder
    {
        $instance = new self;
        return new class($constructor = function ($alexaPresentationAPL, $alexaPresentationAPLT, $alexaPresentationHTML, $audioPlayer, $display, $videoApp, $geolocation, $navigation) use ($instance): SupportedInterfaces {
            $instance->alexaPresentationAPL = $alexaPresentationAPL;
            $instance->alexaPresentationAPLT = $alexaPresentationAPLT;
            $instance->alexaPresentationHTML = $alexaPresentationHTML;
            $instance->audioPlayer = $audioPlayer;
            $instance->display = $display;
            $instance->videoApp = $videoApp;
            $instance->geolocation = $geolocation;
            $instance->navigation = $navigation;
            return $instance;
        }) extends SupportedInterfacesBuilder {};
    }

    /**
     * @param AlexaPresentationAplInterface $alexaPresentationAPL
     * @return self
     */
    public static function ofAlexaPresentationAPL(AlexaPresentationAplInterface $alexaPresentationAPL): SupportedInterfaces
    {
        $instance = new self;
        $instance->alexaPresentationAPL = $alexaPresentationAPL;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->alexaPresentationAPL = isset($data['Alexa.Presentation.APL']) ? AlexaPresentationAplInterface::fromValue($data['Alexa.Presentation.APL']) : null;
        $instance->alexaPresentationAPLT = isset($data['Alexa.Presentation.APLT']) ? AlexaPresentationApltInterface::fromValue($data['Alexa.Presentation.APLT']) : null;
        $instance->alexaPresentationHTML = isset($data['Alexa.Presentation.HTML']) ? AlexaPresentationHtmlInterface::fromValue($data['Alexa.Presentation.HTML']) : null;
        $instance->audioPlayer = isset($data['AudioPlayer']) ? AudioPlayerInterface::fromValue($data['AudioPlayer']) : null;
        $instance->display = isset($data['Display']) ? DisplayInterface::fromValue($data['Display']) : null;
        $instance->videoApp = isset($data['VideoApp']) ? VideoAppInterface::fromValue($data['VideoApp']) : null;
        $instance->geolocation = isset($data['Geolocation']) ? GeolocationInterface::fromValue($data['Geolocation']) : null;
        $instance->navigation = isset($data['Navigation']) ? NavigationInterface::fromValue($data['Navigation']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'Alexa.Presentation.APL' => $this->alexaPresentationAPL,
            'Alexa.Presentation.APLT' => $this->alexaPresentationAPLT,
            'Alexa.Presentation.HTML' => $this->alexaPresentationHTML,
            'AudioPlayer' => $this->audioPlayer,
            'Display' => $this->display,
            'VideoApp' => $this->videoApp,
            'Geolocation' => $this->geolocation,
            'Navigation' => $this->navigation
        ]);
    }
}
