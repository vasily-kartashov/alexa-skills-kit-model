<?php

namespace Alexa\Model\SLU\EntityResolution;

abstract class ResolutionsBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Resolution[] */
    private $resolutionsPerAuthority = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $resolutionsPerAuthority
     * @return self
     */
    public function withResolutionsPerAuthority(array $resolutionsPerAuthority): self
    {
        foreach ($resolutionsPerAuthority as $element) {
            assert($element instanceof Resolution);
        }
        $this->resolutionsPerAuthority = $resolutionsPerAuthority;
        return $this;
    }

    public function build(): Resolutions
    {
        return ($this->constructor)(
            $this->resolutionsPerAuthority
        );
    }
}
