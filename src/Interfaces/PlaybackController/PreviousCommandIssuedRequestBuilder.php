<?php

namespace Alexa\Model\Interfaces\PlaybackController;

use Alexa\Model\Request;

abstract class PreviousCommandIssuedRequestBuilder
{
    /** @var callable */
    private $constructor;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function build(): PreviousCommandIssuedRequest
    {
        return ($this->constructor)(
            
        );
    }
}
