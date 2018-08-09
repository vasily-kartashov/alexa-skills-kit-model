<?php

namespace Alexa\Model\Interfaces\Display;

use \JsonSerializable;

final class ImageInstance implements JsonSerializable
{
    /** @var string|null */
    private $url = null;

    /** @var ImageSize|null */
    private $size = null;

    /** @var int|null */
    private $widthPixels = null;

    /** @var int|null */
    private $heightPixels = null;

    protected function __construct()
    {
    }

    /**
     * @return string|null
     */
    public function url()
    {
        return $this->url;
    }

    /**
     * @return ImageSize|null
     */
    public function size()
    {
        return $this->size;
    }

    /**
     * @return int|null
     */
    public function widthPixels()
    {
        return $this->widthPixels;
    }

    /**
     * @return int|null
     */
    public function heightPixels()
    {
        return $this->heightPixels;
    }

    public static function builder(): ImageInstanceBuilder
    {
        $instance = new self();
        $constructor = function ($url, $size, $widthPixels, $heightPixels) use ($instance): ImageInstance {
            $instance->url = $url;
            $instance->size = $size;
            $instance->widthPixels = $widthPixels;
            $instance->heightPixels = $heightPixels;
            return $instance;
        };
        return new class($constructor) extends ImageInstanceBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->url = isset($data['url']) ? ((string) $data['url']) : null;
        $instance->size = isset($data['size']) ? ImageSize::fromValue($data['size']) : null;
        $instance->widthPixels = isset($data['widthPixels']) ? ((int) $data['widthPixels']) : null;
        $instance->heightPixels = isset($data['heightPixels']) ? ((int) $data['heightPixels']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'url' => $this->url,
            'size' => $this->size,
            'widthPixels' => $this->widthPixels,
            'heightPixels' => $this->heightPixels
        ]);
    }
}
