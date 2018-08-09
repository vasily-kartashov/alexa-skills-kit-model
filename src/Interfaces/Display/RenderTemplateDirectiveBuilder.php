<?php

namespace Alexa\Model\Interfaces\Display;

use Alexa\Model\Directive;

abstract class RenderTemplateDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Template|null */
    private $template = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withTemplate(Template $template): self
    {
        $this->template = $template;
        return $this;
    }

    public function build(): RenderTemplateDirective
    {
        return ($this->constructor)(
            $this->template
        );
    }
}
