<?php

namespace Alexa\Model;

abstract class LaunchRequestBuilder
{
    /** @var callable */
    private $constructor;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function build(): LaunchRequest
    {
        return ($this->constructor)(
            
        );
    }
}
