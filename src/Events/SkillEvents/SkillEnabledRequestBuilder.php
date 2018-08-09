<?php

namespace Alexa\Model\Events\SkillEvents;

use Alexa\Model\Request;

abstract class SkillEnabledRequestBuilder
{
    /** @var callable */
    private $constructor;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function build(): SkillEnabledRequest
    {
        return ($this->constructor)(
            
        );
    }
}
