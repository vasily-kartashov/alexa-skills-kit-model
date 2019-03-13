<?php

namespace Alexa\Model\Interfaces\Display;

abstract class ListItemBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $token = null;

    /** @var Image|null */
    private $image = null;

    /** @var TextContent|null */
    private $textContent = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $token
     * @return self
     */
    public function withToken(string $token): self
    {
        $this->token = $token;
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

    /**
     * @param TextContent $textContent
     * @return self
     */
    public function withTextContent(TextContent $textContent): self
    {
        $this->textContent = $textContent;
        return $this;
    }

    public function build(): ListItem
    {
        return ($this->constructor)(
            $this->token,
            $this->image,
            $this->textContent
        );
    }
}
