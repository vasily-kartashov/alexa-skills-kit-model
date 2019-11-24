<?php

namespace Alexa\Model\Interfaces\PlaybackController;

abstract class PauseCommandIssuedRequestBuilder
{
    /** @var callable */
    private $constructor;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function build(): PauseCommandIssuedRequest
    {
        return ($this->constructor)(
            
        );
    }
}
