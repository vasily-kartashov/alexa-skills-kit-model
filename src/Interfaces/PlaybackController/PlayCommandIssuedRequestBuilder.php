<?php

namespace Alexa\Model\Interfaces\PlaybackController;

abstract class PlayCommandIssuedRequestBuilder
{
    /** @var callable */
    private $constructor;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function build(): PlayCommandIssuedRequest
    {
        return ($this->constructor)(
            
        );
    }
}
