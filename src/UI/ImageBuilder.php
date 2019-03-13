<?php

namespace Alexa\Model\UI;

abstract class ImageBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $smallImageUrl = null;

    /** @var string|null */
    private $largeImageUrl = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $smallImageUrl
     * @return self
     */
    public function withSmallImageUrl(string $smallImageUrl): self
    {
        $this->smallImageUrl = $smallImageUrl;
        return $this;
    }

    /**
     * @param mixed $largeImageUrl
     * @return self
     */
    public function withLargeImageUrl(string $largeImageUrl): self
    {
        $this->largeImageUrl = $largeImageUrl;
        return $this;
    }

    public function build(): Image
    {
        return ($this->constructor)(
            $this->smallImageUrl,
            $this->largeImageUrl
        );
    }
}
