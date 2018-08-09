<?php

namespace Alexa\Model\Interfaces\Display;

use Alexa\Model\Directive;

abstract class HintDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Hint|null */
    private $hint = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withHint(Hint $hint): self
    {
        $this->hint = $hint;
        return $this;
    }

    public function build(): HintDirective
    {
        return ($this->constructor)(
            $this->hint
        );
    }
}
