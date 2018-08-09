<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use Alexa\Model\Request;

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

    public function withCurrentPlaybackState(CurrentPlaybackState $currentPlaybackState): self
    {
        $this->currentPlaybackState = $currentPlaybackState;
        return $this;
    }

    public function withError(Error $error): self
    {
        $this->error = $error;
        return $this;
    }

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
