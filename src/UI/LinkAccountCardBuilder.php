<?php

namespace Alexa\Model\UI;

abstract class LinkAccountCardBuilder
{
    /** @var callable */
    private $constructor;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function build(): LinkAccountCard
    {
        return ($this->constructor)(
            
        );
    }
}
