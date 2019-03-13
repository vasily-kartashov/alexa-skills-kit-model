<?php

namespace Alexa\Model\Interfaces\VideoApp;

abstract class LaunchDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var VideoItem|null */
    private $videoItem = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param VideoItem $videoItem
     * @return self
     */
    public function withVideoItem(VideoItem $videoItem): self
    {
        $this->videoItem = $videoItem;
        return $this;
    }

    public function build(): LaunchDirective
    {
        return ($this->constructor)(
            $this->videoItem
        );
    }
}
