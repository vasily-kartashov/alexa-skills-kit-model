<?php

namespace Alexa\Model\Events\SkillEvents;

use Alexa\Model\Request;

abstract class SkillDisabledRequestBuilder
{
    /** @var callable */
    private $constructor;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function build(): SkillDisabledRequest
    {
        return ($this->constructor)(
            
        );
    }
}