<?php

namespace Alexa\Model\Dialog;

use Alexa\Model\Intent;

abstract class DelegateDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Intent|null */
    private $updatedIntent = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Intent $updatedIntent
     * @return self
     */
    public function withUpdatedIntent(Intent $updatedIntent): self
    {
        $this->updatedIntent = $updatedIntent;
        return $this;
    }

    public function build(): DelegateDirective
    {
        return ($this->constructor)(
            $this->updatedIntent
        );
    }
}
