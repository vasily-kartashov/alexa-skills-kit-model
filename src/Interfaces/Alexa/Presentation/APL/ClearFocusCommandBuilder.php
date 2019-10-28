<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class ClearFocusCommandBuilder
{
    /** @var callable */
    private $constructor;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function build(): ClearFocusCommand
    {
        return ($this->constructor)();
    }
}
