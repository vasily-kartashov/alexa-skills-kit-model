<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

abstract class PlaybackStartedRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $offsetInMilliseconds = null;

    /** @var string|null */
    private $token = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $offsetInMilliseconds
     * @return self
     */
    public function withOffsetInMilliseconds(int $offsetInMilliseconds): self
    {
        $this->offsetInMilliseconds = $offsetInMilliseconds;
        return $this;
    }

    /**
     * @param mixed $token
     * @return self
     */
    public function withToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    public function build(): PlaybackStartedRequest
    {
        return ($this->constructor)(
            $this->offsetInMilliseconds,
            $this->token
        );
    }
}
