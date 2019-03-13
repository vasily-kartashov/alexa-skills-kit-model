<?php

namespace Alexa\Model\Interfaces\Display;

abstract class ListTemplate1Builder
{
    /** @var callable */
    private $constructor;

    /** @var Image|null */
    private $backgroundImage = null;

    /** @var string|null */
    private $title = null;

    /** @var ListItem[] */
    private $listItems = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param Image $backgroundImage
     * @return self
     */
    public function withBackgroundImage(Image $backgroundImage): self
    {
        $this->backgroundImage = $backgroundImage;
        return $this;
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
     * @param array $listItems
     * @return self
     */
    public function withListItems(array $listItems): self
    {
        foreach ($listItems as $element) {
            assert($element instanceof ListItem);
        }
        $this->listItems = $listItems;
        return $this;
    }

    public function build(): ListTemplate1
    {
        return ($this->constructor)(
            $this->backgroundImage,
            $this->title,
            $this->listItems
        );
    }
}
