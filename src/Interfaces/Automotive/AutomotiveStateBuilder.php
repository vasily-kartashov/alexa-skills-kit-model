<?php

namespace Alexa\Model\Interfaces\Automotive;

abstract class AutomotiveStateBuilder
{
    /** @var callable */
    private $constructor;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function build(): AutomotiveState
    {
        return ($this->constructor)();
    }
}
