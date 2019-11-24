<?php

namespace Alexa\Model;

use Alexa\Model\Interfaces\Alexa\Presentation\APL\RenderedDocumentState;
use Alexa\Model\Interfaces\AudioPlayer\AudioPlayerState;
use Alexa\Model\Interfaces\Automotive\AutomotiveState;
use Alexa\Model\Interfaces\Display\DisplayState;
use Alexa\Model\Interfaces\Geolocation\GeolocationState;
use Alexa\Model\Interfaces\System\SystemState;
use Alexa\Model\Interfaces\Viewport\TypedViewportState;
use Alexa\Model\Interfaces\Viewport\ViewportState;

abstract class ContextBuilder
{
    /** @var callable */
    private $constructor;

    /** @var SystemState|null */
    private $system = null;

    /** @var RenderedDocumentState|null */
    private $alexaPresentationAPL = null;

    /** @var AudioPlayerState|null */
    private $audioPlayer = null;

    /** @var AutomotiveState|null */
    private $automotive = null;

    /** @var DisplayState|null */
    private $display = null;

    /** @var GeolocationState|null */
    private $geolocation = null;

    /** @var ViewportState|null */
    private $viewport = null;

    /** @var TypedViewportState[] */
    private $viewports = [];

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
     * @param RenderedDocumentState $alexaPresentationAPL
     * @return self
     */
    public function withAlexaPresentationAPL(RenderedDocumentState $alexaPresentationAPL): self
    {
        $this->alexaPresentationAPL = $alexaPresentationAPL;
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
     * @param AutomotiveState $automotive
     * @return self
     */
    public function withAutomotive(AutomotiveState $automotive): self
    {
        $this->automotive = $automotive;
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

    /**
     * @param array $viewports
     * @return self
     */
    public function withViewports(array $viewports): self
    {
        foreach ($viewports as $element) {
            assert($element instanceof TypedViewportState);
        }
        $this->viewports = $viewports;
        return $this;
    }

    public function build(): Context
    {
        return ($this->constructor)(
            $this->system,
            $this->alexaPresentationAPL,
            $this->audioPlayer,
            $this->automotive,
            $this->display,
            $this->geolocation,
            $this->viewport,
            $this->viewports
        );
    }
}
