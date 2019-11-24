<?php

namespace Alexa\Model\Interfaces\Viewport;

use Alexa\Model\Interfaces\Viewport\APL\ViewportConfiguration;
use JsonSerializable;

final class APLViewportState extends TypedViewportState implements JsonSerializable
{
    const TYPE = 'APL';

    /** @var Shape|null */
    private $shape = null;

    /** @var mixed|null */
    private $dpi = null;

    /** @var PresentationType|null */
    private $presentationType = null;

    /** @var bool|null */
    private $canRotate = null;

    /** @var ViewportConfiguration|null */
    private $configuration = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
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
    public function dpi()
    {
        return $this->dpi;
    }

    /**
     * @return PresentationType|null
     */
    public function presentationType()
    {
        return $this->presentationType;
    }

    /**
     * @return bool|null
     */
    public function canRotate()
    {
        return $this->canRotate;
    }

    /**
     * @return ViewportConfiguration|null
     */
    public function configuration()
    {
        return $this->configuration;
    }

    public static function builder(): APLViewportStateBuilder
    {
        $instance = new self;
        return new class($constructor = function ($shape, $dpi, $presentationType, $canRotate, $configuration) use ($instance): APLViewportState {
            $instance->shape = $shape;
            $instance->dpi = $dpi;
            $instance->presentationType = $presentationType;
            $instance->canRotate = $canRotate;
            $instance->configuration = $configuration;
            return $instance;
        }) extends APLViewportStateBuilder {};
    }

    /**
     * @param Shape $shape
     * @return self
     */
    public static function ofShape(Shape $shape): APLViewportState
    {
        $instance = new self;
        $instance->shape = $shape;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->shape = isset($data['shape']) ? Shape::fromValue($data['shape']) : null;
        $instance->dpi = $data['dpi'];
        $instance->presentationType = isset($data['presentationType']) ? PresentationType::fromValue($data['presentationType']) : null;
        $instance->canRotate = isset($data['canRotate']) ? ((bool) $data['canRotate']) : null;
        $instance->configuration = isset($data['configuration']) ? ViewportConfiguration::fromValue($data['configuration']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'shape' => $this->shape,
            'dpi' => $this->dpi,
            'presentationType' => $this->presentationType,
            'canRotate' => $this->canRotate,
            'configuration' => $this->configuration
        ]);
    }
}
