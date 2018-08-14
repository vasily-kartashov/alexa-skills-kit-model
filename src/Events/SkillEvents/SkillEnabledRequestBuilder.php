<?php

namespace Alexa\Model\Events\SkillEvents;

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
