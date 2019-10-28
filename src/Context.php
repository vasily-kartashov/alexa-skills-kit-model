<?php

namespace Alexa\Model;

use Alexa\Model\Interfaces\AudioPlayer\AudioPlayerState;
use Alexa\Model\Interfaces\Automotive\AutomotiveState;
use Alexa\Model\Interfaces\Display\DisplayState;
use Alexa\Model\Interfaces\Geolocation\GeolocationState;
use Alexa\Model\Interfaces\System\SystemState;
use Alexa\Model\Interfaces\Viewport\TypedViewportState;
use Alexa\Model\Interfaces\Viewport\ViewportState;
use \JsonSerializable;

final class Context implements JsonSerializable
{
    /** @var SystemState|null */
    private $system = null;

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
     * @return AutomotiveState|null
     */
    public function automotive()
    {
        return $this->automotive;
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

    /**
     * @return TypedViewportState[]
     */
    public function viewports()
    {
        return $this->viewports;
    }

    public static function builder(): ContextBuilder
    {
        $instance = new self();
        $constructor = function ($system, $audioPlayer, $automotive, $display, $geolocation, $viewport, $viewports) use ($instance): Context {
            $instance->system = $system;
            $instance->audioPlayer = $audioPlayer;
            $instance->automotive = $automotive;
            $instance->display = $display;
            $instance->geolocation = $geolocation;
            $instance->viewport = $viewport;
            $instance->viewports = $viewports;
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
        $instance->automotive = isset($data['Automotive']) ? AutomotiveState::fromValue($data['Automotive']) : null;
        $instance->display = isset($data['Display']) ? DisplayState::fromValue($data['Display']) : null;
        $instance->geolocation = isset($data['Geolocation']) ? GeolocationState::fromValue($data['Geolocation']) : null;
        $instance->viewport = isset($data['Viewport']) ? ViewportState::fromValue($data['Viewport']) : null;
        $instance->viewports = [];
        if (isset($data['Viewports'])) {
            foreach ($data['Viewports'] as $item) {
                $element = isset($item) ? TypedViewportState::fromValue($item) : null;
                if ($element !== null) {
                    $instance->viewports[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'System' => $this->system,
            'AudioPlayer' => $this->audioPlayer,
            'Automotive' => $this->automotive,
            'Display' => $this->display,
            'Geolocation' => $this->geolocation,
            'Viewport' => $this->viewport,
            'Viewports' => $this->viewports
        ]);
    }
}
