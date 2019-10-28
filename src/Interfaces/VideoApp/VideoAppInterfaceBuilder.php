<?php

namespace Alexa\Model\Interfaces\VideoApp;

abstract class VideoAppInterfaceBuilder
{
    /** @var callable */
    private $constructor;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function build(): VideoAppInterface
    {
        return ($this->constructor)();
    }
}
