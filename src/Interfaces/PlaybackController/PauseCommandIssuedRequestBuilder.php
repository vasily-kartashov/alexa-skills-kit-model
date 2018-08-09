<?php

namespace Alexa\Model\Interfaces\PlaybackController;

use Alexa\Model\Request;

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
