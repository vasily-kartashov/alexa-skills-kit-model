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
     * @param Resolution[] $resolutionsPerAuthority
     * @return self
     */
    public function withResolutionsPerAuthority(array $resolutionsPerAuthority): self
    {
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
