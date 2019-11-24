<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class RenderedDocumentStateBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $token = null;

    /** @var string|null */
    private $version = null;

    /** @var ComponentVisibleOnScreen[] */
    private $componentsVisibleOnScreen = [];

    public function __construct(callable $constructor)
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
     * @param string $version
     * @return self
     */
    public function withVersion(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @param array $componentsVisibleOnScreen
     * @return self
     */
    public function withComponentsVisibleOnScreen(array $componentsVisibleOnScreen): self
    {
        foreach ($componentsVisibleOnScreen as $element) {
            assert($element instanceof ComponentVisibleOnScreen);
        }
        $this->componentsVisibleOnScreen = $componentsVisibleOnScreen;
        return $this;
    }

    public function build(): RenderedDocumentState
    {
        return ($this->constructor)(
            $this->token,
            $this->version,
            $this->componentsVisibleOnScreen
        );
    }
}
