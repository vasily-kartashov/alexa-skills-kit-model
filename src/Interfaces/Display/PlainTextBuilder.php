<?php

namespace Alexa\Model\Interfaces\Display;

abstract class PlainTextBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $text = null;

    public function __construct(callable $constructor)
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

    public function build(): PlainText
    {
        return ($this->constructor)(
            $this->text
        );
    }
}
