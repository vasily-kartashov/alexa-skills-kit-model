<?php

namespace Alexa\Model\Interfaces\Display;

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

    /**
     * @param mixed $template
     * @return self
     */
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
