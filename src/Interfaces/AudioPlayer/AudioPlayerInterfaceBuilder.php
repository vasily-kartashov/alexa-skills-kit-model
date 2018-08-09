<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

abstract class AudioPlayerInterfaceBuilder
{
    /** @var callable */
    private $constructor;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function build(): AudioPlayerInterface
    {
        return ($this->constructor)(
            
        );
    }
}
