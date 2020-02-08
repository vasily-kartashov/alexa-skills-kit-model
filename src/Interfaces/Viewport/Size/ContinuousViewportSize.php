<?php

namespace Alexa\Model\Interfaces\Viewport\Size;

use JsonSerializable;

final class ContinuousViewportSize extends ViewportSize implements JsonSerializable
{
    const TYPE = 'CONTINUOUS';

    /** @var int|null */
    private $minPixelWidth = null;

    /** @var int|null */
    private $minPixelHeight = null;

    /** @var int|null */
    private $maxPixelWidth = null;

    /** @var int|null */
    private $maxPixelHeight = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return int|null
     */
    public function minPixelWidth()
    {
        return $this->minPixelWidth;
    }

    /**
     * @return int|null
     */
    public function minPixelHeight()
    {
        return $this->minPixelHeight;
    }

    /**
     * @return int|null
     */
    public function maxPixelWidth()
    {
        return $this->maxPixelWidth;
    }

    /**
     * @return int|null
     */
    public function maxPixelHeight()
    {
        return $this->maxPixelHeight;
    }

    public static function builder(): ContinuousViewportSizeBuilder
    {
        $instance = new self;
        return new class($constructor = function ($minPixelWidth, $minPixelHeight, $maxPixelWidth, $maxPixelHeight) use ($instance): ContinuousViewportSize {
            $instance->minPixelWidth = $minPixelWidth;
            $instance->minPixelHeight = $minPixelHeight;
            $instance->maxPixelWidth = $maxPixelWidth;
            $instance->maxPixelHeight = $maxPixelHeight;
            return $instance;
        }) extends ContinuousViewportSizeBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->minPixelWidth = isset($data['minPixelWidth']) ? ((int) $data['minPixelWidth']) : null;
        $instance->minPixelHeight = isset($data['minPixelHeight']) ? ((int) $data['minPixelHeight']) : null;
        $instance->maxPixelWidth = isset($data['maxPixelWidth']) ? ((int) $data['maxPixelWidth']) : null;
        $instance->maxPixelHeight = isset($data['maxPixelHeight']) ? ((int) $data['maxPixelHeight']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'minPixelWidth' => $this->minPixelWidth,
            'minPixelHeight' => $this->minPixelHeight,
            'maxPixelWidth' => $this->maxPixelWidth,
            'maxPixelHeight' => $this->maxPixelHeight
        ]);
    }
}
