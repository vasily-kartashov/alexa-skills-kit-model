<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

abstract class CurrentPlaybackStateBuilder
{
    /** @var callable */
    private $constructor;

    /** @var int|null */
    private $offsetInMilliseconds = null;

    /** @var PlayerActivity|null */
    private $playerActivity = null;

    /** @var string|null */
    private $token = null;

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
     * @param PlayerActivity $playerActivity
     * @return self
     */
    public function withPlayerActivity(PlayerActivity $playerActivity): self
    {
        $this->playerActivity = $playerActivity;
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

    public function build(): CurrentPlaybackState
    {
        return ($this->constructor)(
            $this->offsetInMilliseconds,
            $this->playerActivity,
            $this->token
        );
    }
}
