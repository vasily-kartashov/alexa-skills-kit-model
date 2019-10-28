<?php

namespace Alexa\Model\Interfaces\AudioPlayer;

abstract class StopDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function build(): StopDirective
    {
        return ($this->constructor)();
    }
}
