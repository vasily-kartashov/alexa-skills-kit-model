<?php

namespace Alexa\Model;

use Alexa\Model\Interfaces\Alexa\Presentation\Apl\AlexaPresentationAplInterface;
use Alexa\Model\Interfaces\AudioPlayer\AudioPlayerInterface;
use Alexa\Model\Interfaces\Display\DisplayInterface;
use Alexa\Model\Interfaces\Geolocation\GeolocationInterface;
use Alexa\Model\Interfaces\VideoApp\VideoAppInterface;
use \JsonSerializable;

final class SupportedInterfaces implements JsonSerializable
{
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

    protected function __construct()
    {
    }

    /**
     * @return AlexaPresentationAplInterface|null
     */
    public function alexa.Presentation.APL()
    {
        return $this->alexa.Presentation.APL;
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

    public static function builder(): SupportedInterfacesBuilder
    {
        $instance = new self();
        $constructor = function ($alexa.Presentation.APL, $audioPlayer, $display, $videoApp, $geolocation) use ($instance): SupportedInterfaces {
            $instance->alexa.Presentation.APL = $alexa.Presentation.APL;
            $instance->audioPlayer = $audioPlayer;
            $instance->display = $display;
            $instance->videoApp = $videoApp;
            $instance->geolocation = $geolocation;
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
        $instance->alexa.Presentation.APL = isset($data['Alexa.Presentation.APL']) ? AlexaPresentationAplInterface::fromValue($data['Alexa.Presentation.APL']) : null;
        $instance->audioPlayer = isset($data['AudioPlayer']) ? AudioPlayerInterface::fromValue($data['AudioPlayer']) : null;
        $instance->display = isset($data['Display']) ? DisplayInterface::fromValue($data['Display']) : null;
        $instance->videoApp = isset($data['VideoApp']) ? VideoAppInterface::fromValue($data['VideoApp']) : null;
        $instance->geolocation = isset($data['Geolocation']) ? GeolocationInterface::fromValue($data['Geolocation']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'Alexa.Presentation.APL' => $this->alexa.Presentation.APL,
            'AudioPlayer' => $this->audioPlayer,
            'Display' => $this->display,
            'VideoApp' => $this->videoApp,
            'Geolocation' => $this->geolocation
        ]);
    }
}
