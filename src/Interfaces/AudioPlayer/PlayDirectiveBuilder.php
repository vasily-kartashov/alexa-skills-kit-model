<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

use Alexa\Model\Directive;

abstract class PlayDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var PlayBehavior|null */
    private $playBehavior = null;

    /** @var AudioItem|null */
    private $audioItem = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withPlayBehavior(PlayBehavior $playBehavior): self
    {
        $this->playBehavior = $playBehavior;
        return $this;
    }

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
