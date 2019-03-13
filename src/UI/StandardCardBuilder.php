<?php

namespace Alexa\Model\UI;

abstract class StandardCardBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $title = null;

    /** @var string|null */
    private $text = null;

    /** @var Image|null */
    private $image = null;

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
     * @param string $text
     * @return self
     */
    public function withText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param Image $image
     * @return self
     */
    public function withImage(Image $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function build(): StandardCard
    {
        return ($this->constructor)(
            $this->title,
            $this->text,
            $this->image
        );
    }
}
