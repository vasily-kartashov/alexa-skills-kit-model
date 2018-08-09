<?php

namespace Alexa\Model\Interfaces\VideoApp;

abstract class MetadataBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $title = null;

    /** @var string|null */
    private $subtitle = null;

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

    public function build(): Metadata
    {
        return ($this->constructor)(
            $this->title,
            $this->subtitle
        );
    }
}
