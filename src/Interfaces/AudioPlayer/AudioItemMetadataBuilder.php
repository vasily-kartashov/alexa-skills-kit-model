<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use Alexa\Model\Interfaces\Display\Image;

abstract class AudioItemMetadataBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $title = null;

    /** @var string|null */
    private $subtitle = null;

    /** @var Image|null */
    private $art = null;

    /** @var Image|null */
    private $backgroundImage = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function withSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    public function withArt(Image $art): self
    {
        $this->art = $art;
        return $this;
    }

    public function withBackgroundImage(Image $backgroundImage): self
    {
        $this->backgroundImage = $backgroundImage;
        return $this;
    }

    public function build(): AudioItemMetadata
    {
        return ($this->constructor)(
            $this->title,
            $this->subtitle,
            $this->art,
            $this->backgroundImage
        );
    }
}
