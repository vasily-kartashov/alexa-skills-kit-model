<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

abstract class AudioItemBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Stream|null */
    private $stream = null;

    /** @var AudioItemMetadata|null */
    private $metadata = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $stream
     * @return self
     */
    public function withStream(Stream $stream): self
    {
        $this->stream = $stream;
        return $this;
    }

    /**
     * @param mixed $metadata
     * @return self
     */
    public function withMetadata(AudioItemMetadata $metadata): self
    {
        $this->metadata = $metadata;
        return $this;
    }

    public function build(): AudioItem
    {
        return ($this->constructor)(
            $this->stream,
            $this->metadata
        );
    }
}
