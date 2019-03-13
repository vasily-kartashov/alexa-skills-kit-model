<?php

namespace Alexa\Model\Interfaces\VideoApp;

abstract class VideoItemBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $source = null;

    /** @var Metadata|null */
    private $metadata = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $source
     * @return self
     */
    public function withSource(string $source): self
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @param Metadata $metadata
     * @return self
     */
    public function withMetadata(Metadata $metadata): self
    {
        $this->metadata = $metadata;
        return $this;
    }

    public function build(): VideoItem
    {
        return ($this->constructor)(
            $this->source,
            $this->metadata
        );
    }
}
