<?php

namespace Alexa\Model\UI;

abstract class SimpleCardBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $title = null;

    /** @var string|null */
    private $content = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $title
     * @return self
     */
    public function withTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $content
     * @return self
     */
    public function withContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function build(): SimpleCard
    {
        return ($this->constructor)(
            $this->title,
            $this->content
        );
    }
}
