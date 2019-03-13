<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

abstract class PlaybackFailedRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var CurrentPlaybackState|null */
    private $currentPlaybackState = null;

    /** @var Error|null */
    private $error = null;

    /** @var string|null */
    private $token = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $currentPlaybackState
     * @return self
     */
    public function withCurrentPlaybackState(CurrentPlaybackState $currentPlaybackState): self
    {
        $this->currentPlaybackState = $currentPlaybackState;
        return $this;
    }

    /**
     * @param mixed $error
     * @return self
     */
    public function withError(Error $error): self
    {
        $this->error = $error;
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

    public function build(): PlaybackFailedRequest
    {
        return ($this->constructor)(
            $this->currentPlaybackState,
            $this->error,
            $this->token
        );
    }
}
