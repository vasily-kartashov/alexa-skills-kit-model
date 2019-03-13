<?php

namespace Alexa\Model\Interfaces\Display;

abstract class TextContentBuilder
{
    /** @var callable */
    private $constructor;

    /** @var TextField|null */
    private $primaryText = null;

    /** @var TextField|null */
    private $secondaryText = null;

    /** @var TextField|null */
    private $tertiaryText = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $primaryText
     * @return self
     */
    public function withPrimaryText(TextField $primaryText): self
    {
        $this->primaryText = $primaryText;
        return $this;
    }

    /**
     * @param mixed $secondaryText
     * @return self
     */
    public function withSecondaryText(TextField $secondaryText): self
    {
        $this->secondaryText = $secondaryText;
        return $this;
    }

    /**
     * @param mixed $tertiaryText
     * @return self
     */
    public function withTertiaryText(TextField $tertiaryText): self
    {
        $this->tertiaryText = $tertiaryText;
        return $this;
    }

    public function build(): TextContent
    {
        return ($this->constructor)(
            $this->primaryText,
            $this->secondaryText,
            $this->tertiaryText
        );
    }
}
