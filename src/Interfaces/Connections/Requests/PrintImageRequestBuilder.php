<?php

namespace Alexa\Model\Interfaces\Connections\Requests;

abstract class PrintImageRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $title = null;

    /** @var string|null */
    private $url = null;

    /** @var string|null */
    private $description = null;

    /** @var string|null */
    private $imageType = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function withUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function withDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function withImageType(string $imageType): self
    {
        $this->imageType = $imageType;
        return $this;
    }

    public function build(): PrintImageRequest
    {
        return ($this->constructor)(
            $this->title,
            $this->url,
            $this->description,
            $this->imageType
        );
    }
}
