<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class VideoSourceBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $description = null;

    /** @var string|null */
    private $duration = null;

    /** @var string|null */
    private $url = null;

    /** @var string|null */
    private $repeatCount = null;

    /** @var string|null */
    private $offset = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
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
     * @param string $duration
     * @return self
     */
    public function withDuration(string $duration): self
    {
        $this->duration = $duration;
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
     * @param string $repeatCount
     * @return self
     */
    public function withRepeatCount(string $repeatCount): self
    {
        $this->repeatCount = $repeatCount;
        return $this;
    }

    /**
     * @param string $offset
     * @return self
     */
    public function withOffset(string $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    public function build(): VideoSource
    {
        return ($this->constructor)(
            $this->description,
            $this->duration,
            $this->url,
            $this->repeatCount,
            $this->offset
        );
    }
}
