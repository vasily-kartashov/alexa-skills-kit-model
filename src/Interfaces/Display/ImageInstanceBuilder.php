<?php

namespace Alexa\Model\Interfaces\Display;

abstract class ImageInstanceBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $url = null;

    /** @var ImageSize|null */
    private $size = null;

    /** @var int|null */
    private $widthPixels = null;

    /** @var int|null */
    private $heightPixels = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $url
     * @return self
     */
    public function withUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param ImageSize $size
     * @return self
     */
    public function withSize(ImageSize $size): self
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @param int $widthPixels
     * @return self
     */
    public function withWidthPixels(int $widthPixels): self
    {
        $this->widthPixels = $widthPixels;
        return $this;
    }

    /**
     * @param int $heightPixels
     * @return self
     */
    public function withHeightPixels(int $heightPixels): self
    {
        $this->heightPixels = $heightPixels;
        return $this;
    }

    public function build(): ImageInstance
    {
        return ($this->constructor)(
            $this->url,
            $this->size,
            $this->widthPixels,
            $this->heightPixels
        );
    }
}
