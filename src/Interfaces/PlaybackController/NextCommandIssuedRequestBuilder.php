<?php

namespace Alexa\Model\Interfaces\PlaybackController;

use Alexa\Model\Request;

abstract class NextCommandIssuedRequestBuilder
{
    /** @var callable */
    private $constructor;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function build(): NextCommandIssuedRequest
    {
        return ($this->constructor)(
            
        );
    }
}
