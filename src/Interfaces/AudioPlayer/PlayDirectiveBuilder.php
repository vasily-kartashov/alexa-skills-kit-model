<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

abstract class PlayDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var PlayBehavior|null */
    private $playBehavior = null;

    /** @var AudioItem|null */
    private $audioItem = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param PlayBehavior $playBehavior
     * @return self
     */
    public function withPlayBehavior(PlayBehavior $playBehavior): self
    {
        $this->playBehavior = $playBehavior;
        return $this;
    }

    /**
     * @param AudioItem $audioItem
     * @return self
     */
    public function withAudioItem(AudioItem $audioItem): self
    {
        $this->audioItem = $audioItem;
        return $this;
    }

    public function build(): PlayDirective
    {
        return ($this->constructor)(
            $this->playBehavior,
            $this->audioItem
        );
    }
}
