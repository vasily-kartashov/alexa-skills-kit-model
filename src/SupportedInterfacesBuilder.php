<?php

namespace Alexa\Model;

use Alexa\Model\Interfaces\AudioPlayer\AudioPlayerInterface;
use Alexa\Model\Interfaces\Display\DisplayInterface;
use Alexa\Model\Interfaces\VideoApp\VideoAppInterface;

abstract class SupportedInterfacesBuilder
{
    /** @var callable */
    private $constructor;

    /** @var AudioPlayerInterface|null */
    private $audioPlayer = null;

    /** @var DisplayInterface|null */
    private $display = null;

    /** @var VideoAppInterface|null */
    private $videoApp = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withAudioPlayer(AudioPlayerInterface $audioPlayer): self
    {
        $this->audioPlayer = $audioPlayer;
        return $this;
    }

    public function withDisplay(DisplayInterface $display): self
    {
        $this->display = $display;
        return $this;
    }

    public function withVideoApp(VideoAppInterface $videoApp): self
    {
        $this->videoApp = $videoApp;
        return $this;
    }

    public function build(): SupportedInterfaces
    {
        return ($this->constructor)(
            $this->audioPlayer,
            $this->display,
            $this->videoApp
        );
    }
}
