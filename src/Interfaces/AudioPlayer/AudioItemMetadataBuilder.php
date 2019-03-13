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

    /**
     * @param string $title
     * @return self
     */
    public function withTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $subtitle
     * @return self
     */
    public function withSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    /**
     * @param Image $art
     * @return self
     */
    public function withArt(Image $art): self
    {
        $this->art = $art;
        return $this;
    }

    /**
     * @param Image $backgroundImage
     * @return self
     */
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
