<?php

namespace Alexa\Model\Interfaces\Viewport\Size;

use JsonSerializable;

final class DiscreteViewportSize extends ViewportSize implements JsonSerializable
{
    const TYPE = 'DISCRETE';

    /** @var int|null */
    private $pixelWidth = null;

    /** @var int|null */
    private $pixelHeight = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return int|null
     */
    public function pixelWidth()
    {
        return $this->pixelWidth;
    }

    /**
     * @return int|null
     */
    public function pixelHeight()
    {
        return $this->pixelHeight;
    }

    public static function builder(): DiscreteViewportSizeBuilder
    {
        $instance = new self;
        return new class($constructor = function ($pixelWidth, $pixelHeight) use ($instance): DiscreteViewportSize {
            $instance->pixelWidth = $pixelWidth;
            $instance->pixelHeight = $pixelHeight;
            return $instance;
        }) extends DiscreteViewportSizeBuilder {};
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->pixelWidth = isset($data['pixelWidth']) ? ((int) $data['pixelWidth']) : null;
        $instance->pixelHeight = isset($data['pixelHeight']) ? ((int) $data['pixelHeight']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'pixelWidth' => $this->pixelWidth,
            'pixelHeight' => $this->pixelHeight
        ]);
    }
}
