<?php

namespace Alexa\Model\Events\SkillEvents;

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
