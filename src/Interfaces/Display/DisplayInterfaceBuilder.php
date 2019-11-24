<?php

namespace Alexa\Model\Interfaces\Display;

abstract class DisplayInterfaceBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $templateVersion = null;

    /** @var string|null */
    private $markupVersion = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $templateVersion
     * @return self
     */
    public function withTemplateVersion(string $templateVersion): self
    {
        $this->templateVersion = $templateVersion;
        return $this;
    }

    /**
     * @param string $markupVersion
     * @return self
     */
    public function withMarkupVersion(string $markupVersion): self
    {
        $this->markupVersion = $markupVersion;
        return $this;
    }

    public function build(): DisplayInterface
    {
        return ($this->constructor)(
            $this->templateVersion,
            $this->markupVersion
        );
    }
}
