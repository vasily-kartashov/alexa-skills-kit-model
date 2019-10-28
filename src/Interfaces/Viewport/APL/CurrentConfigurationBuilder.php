<?php

namespace Alexa\Model\Interfaces\Viewport\APL;

use Alexa\Model\Interfaces\Viewport\Mode;
use Alexa\Model\Interfaces\Viewport\Size\ViewportSize;
use Alexa\Model\Interfaces\Viewport\ViewportVideo;

abstract class CurrentConfigurationBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Mode|null */
    private $mode = null;

    /** @var ViewportVideo|null */
    private $video = null;

    /** @var ViewportSize|null */
    private $size = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Mode $mode
     * @return self
     */
    public function withMode(Mode $mode): self
    {
        $this->mode = $mode;
        return $this;
    }

    /**
     * @param ViewportVideo $video
     * @return self
     */
    public function withVideo(ViewportVideo $video): self
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @param ViewportSize $size
     * @return self
     */
    public function withSize(ViewportSize $size): self
    {
        $this->size = $size;
        return $this;
    }

    public function build(): CurrentConfiguration
    {
        return ($this->constructor)(
            $this->mode,
            $this->video,
            $this->size
        );
    }
}
