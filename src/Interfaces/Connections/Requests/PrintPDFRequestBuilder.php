<?php

namespace Alexa\Model\Interfaces\Connections\Requests;

abstract class PrintPDFRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $title = null;

    /** @var string|null */
    private $url = null;

    /** @var string|null */
    private $description = null;

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

    public function build(): PrintPDFRequest
    {
        return ($this->constructor)(
            $this->title,
            $this->url,
            $this->description
        );
    }
}
