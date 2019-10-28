<?php

namespace Alexa\Model\Interfaces\Viewport;

use \JsonSerializable;

final class ViewportState implements JsonSerializable
{
    /** @var Experience[] */
    private $experiences = [];

    /** @var Mode|null */
    private $mode = null;

    /** @var Shape|null */
    private $shape = null;

    /** @var mixed|null */
    private $pixelWidth = null;

    /** @var mixed|null */
    private $pixelHeight = null;

    /** @var mixed|null */
    private $dpi = null;

    /** @var mixed|null */
    private $currentPixelWidth = null;

    /** @var mixed|null */
    private $currentPixelHeight = null;

    /** @var Touch[] */
    private $touch = [];

    /** @var Keyboard[] */
    private $keyboard = [];

    /** @var ViewportStateVideo|null */
    private $video = null;

    protected function __construct()
    {
    }

    /**
     * @return Experience[]
     */
    public function experiences()
    {
        return $this->experiences;
    }

    /**
     * @return Mode|null
     */
    public function mode()
    {
        return $this->mode;
    }

    /**
     * @return Shape|null
     */
    public function shape()
    {
        return $this->shape;
    }

    /**
     * @return mixed|null
     */
    public function pixelWidth()
    {
        return $this->pixelWidth;
    }

    /**
     * @return mixed|null
     */
    public function pixelHeight()
    {
        return $this->pixelHeight;
    }

    /**
     * @return mixed|null
     */
    public function dpi()
    {
        return $this->dpi;
    }

    /**
     * @return mixed|null
     */
    public function currentPixelWidth()
    {
        return $this->currentPixelWidth;
    }

    /**
     * @return mixed|null
     */
    public function currentPixelHeight()
    {
        return $this->currentPixelHeight;
    }

    /**
     * @return Touch[]
     */
    public function touch()
    {
        return $this->touch;
    }

    /**
     * @return Keyboard[]
     */
    public function keyboard()
    {
        return $this->keyboard;
    }

    /**
     * @return ViewportStateVideo|null
     */
    public function video()
    {
        return $this->video;
    }

    public static function builder(): ViewportStateBuilder
    {
        $instance = new self;
        $constructor = function ($experiences, $mode, $shape, $pixelWidth, $pixelHeight, $dpi, $currentPixelWidth, $currentPixelHeight, $touch, $keyboard, $video) use ($instance): ViewportState {
            $instance->experiences = $experiences;
            $instance->mode = $mode;
            $instance->shape = $shape;
            $instance->pixelWidth = $pixelWidth;
            $instance->pixelHeight = $pixelHeight;
            $instance->dpi = $dpi;
            $instance->currentPixelWidth = $currentPixelWidth;
            $instance->currentPixelHeight = $currentPixelHeight;
            $instance->touch = $touch;
            $instance->keyboard = $keyboard;
            $instance->video = $video;
            return $instance;
        };
        return new class($constructor) extends ViewportStateBuilder
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
        $instance = new self;
        $instance->experiences = [];
        if (isset($data['experiences'])) {
            foreach ($data['experiences'] as $item) {
                $element = isset($item) ? Experience::fromValue($item) : null;
                if ($element !== null) {
                    $instance->experiences[] = $element;
                }
            }
        }
        $instance->mode = isset($data['mode']) ? Mode::fromValue($data['mode']) : null;
        $instance->shape = isset($data['shape']) ? Shape::fromValue($data['shape']) : null;
        $instance->pixelWidth = $data['pixelWidth'];
        $instance->pixelHeight = $data['pixelHeight'];
        $instance->dpi = $data['dpi'];
        $instance->currentPixelWidth = $data['currentPixelWidth'];
        $instance->currentPixelHeight = $data['currentPixelHeight'];
        $instance->touch = [];
        if (isset($data['touch'])) {
            foreach ($data['touch'] as $item) {
                $element = isset($item) ? Touch::fromValue($item) : null;
                if ($element !== null) {
                    $instance->touch[] = $element;
                }
            }
        }
        $instance->keyboard = [];
        if (isset($data['keyboard'])) {
            foreach ($data['keyboard'] as $item) {
                $element = isset($item) ? Keyboard::fromValue($item) : null;
                if ($element !== null) {
                    $instance->keyboard[] = $element;
                }
            }
        }
        $instance->video = isset($data['video']) ? ViewportStateVideo::fromValue($data['video']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'experiences' => $this->experiences,
            'mode' => $this->mode,
            'shape' => $this->shape,
            'pixelWidth' => $this->pixelWidth,
            'pixelHeight' => $this->pixelHeight,
            'dpi' => $this->dpi,
            'currentPixelWidth' => $this->currentPixelWidth,
            'currentPixelHeight' => $this->currentPixelHeight,
            'touch' => $this->touch,
            'keyboard' => $this->keyboard,
            'video' => $this->video
        ]);
    }
}
