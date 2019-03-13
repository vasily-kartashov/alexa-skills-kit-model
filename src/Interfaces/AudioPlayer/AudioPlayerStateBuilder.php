<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

abstract class AudioPlayerStateBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $offsetInMilliseconds = null;

    /** @var string|null */
    private $token = null;

    /** @var PlayerActivity|null */
    private $playerActivity = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param int $offsetInMilliseconds
     * @return self
     */
    public function withOffsetInMilliseconds(int $offsetInMilliseconds): self
    {
        $this->offsetInMilliseconds = $offsetInMilliseconds;
        return $this;
    }

    /**
     * @param string $token
     * @return self
     */
    public function withToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @param PlayerActivity $playerActivity
     * @return self
     */
    public function withPlayerActivity(PlayerActivity $playerActivity): self
    {
        $this->playerActivity = $playerActivity;
        return $this;
    }

    public function build(): AudioPlayerState
    {
        return ($this->constructor)(
            $this->offsetInMilliseconds,
            $this->token,
            $this->playerActivity
        );
    }
}
