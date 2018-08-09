<?php

namespace Alexa\Model;

use Alexa\Model\Interfaces\AudioPlayer\AudioPlayerState;
use Alexa\Model\Interfaces\Display\DisplayState;
use Alexa\Model\Interfaces\System\SystemState;

abstract class ContextBuilder
{
    /** @var callable */
    private $constructor;

    /** @var SystemState|null */
    private $system = null;

    /** @var AudioPlayerState|null */
    private $audioPlayer = null;

    /** @var DisplayState|null */
    private $display = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withSystem(SystemState $system): self
    {
        $this->system = $system;
        return $this;
    }

    public function withAudioPlayer(AudioPlayerState $audioPlayer): self
    {
        $this->audioPlayer = $audioPlayer;
        return $this;
    }

    public function withDisplay(DisplayState $display): self
    {
        $this->display = $display;
        return $this;
    }

    public function build(): Context
    {
        return ($this->constructor)(
            $this->system,
            $this->audioPlayer,
            $this->display
        );
    }
}
