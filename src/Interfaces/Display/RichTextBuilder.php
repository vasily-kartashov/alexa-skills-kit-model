<?php

namespace Alexa\Model\Interfaces\Display;

abstract class RichTextBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $text = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $text
     * @return self
     */
    public function withText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function build(): RichText
    {
        return ($this->constructor)(
            $this->text
        );
    }
}
