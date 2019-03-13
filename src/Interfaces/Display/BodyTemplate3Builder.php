<?php

namespace Alexa\Model\Interfaces\Display;

abstract class BodyTemplate3Builder
{
    /** @var callable */
    private $constructor;

    /** @var Image|null */
    private $backgroundImage = null;

    /** @var Image|null */
    private $image = null;

    /** @var string|null */
    private $title = null;

    /** @var TextContent|null */
    private $textContent = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $backgroundImage
     * @return self
     */
    public function withBackgroundImage(Image $backgroundImage): self
    {
        $this->backgroundImage = $backgroundImage;
        return $this;
    }

    /**
     * @param mixed $image
     * @return self
     */
    public function withImage(Image $image): self
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @param mixed $title
     * @return self
     */
    public function withTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param mixed $textContent
     * @return self
     */
    public function withTextContent(TextContent $textContent): self
    {
        $this->textContent = $textContent;
        return $this;
    }

    public function build(): BodyTemplate3
    {
        return ($this->constructor)(
            $this->backgroundImage,
            $this->image,
            $this->title,
            $this->textContent
        );
    }
}
