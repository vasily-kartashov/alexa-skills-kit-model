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

    public function __construct(callable $constructor)
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
     * @param string $url
     * @return self
     */
    public function withUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param string $description
     * @return self
     */
    public function withDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param string $imageType
     * @return self
     */
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
