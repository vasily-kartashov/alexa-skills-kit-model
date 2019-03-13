<?php

namespace Alexa\Model\Interfaces\Display;

abstract class BodyTemplate7Builder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $title = null;

    /** @var Image|null */
    private $image = null;

    /** @var Image|null */
    private $backgroundImage = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
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
     * @param mixed $image
     * @return self
     */
    public function withImage(Image $image): self
    {
        $this->image = $image;
        return $this;
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

    public function build(): BodyTemplate7
    {
        return ($this->constructor)(
            $this->title,
            $this->image,
            $this->backgroundImage
        );
    }
}
