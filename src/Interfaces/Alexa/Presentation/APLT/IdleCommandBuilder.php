<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

abstract class IdleCommandBuilder
{
    /** @var callable */
    private $constructor;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function build(): IdleCommand
    {
        return ($this->constructor)();
    }
}
