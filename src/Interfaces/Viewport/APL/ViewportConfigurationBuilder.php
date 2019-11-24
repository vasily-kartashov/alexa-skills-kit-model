<?php

namespace Alexa\Model\Interfaces\Viewport\APL;

abstract class ViewportConfigurationBuilder
{
    /** @var callable */
    private $constructor;

    /** @var CurrentConfiguration|null */
    private $current = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param CurrentConfiguration $current
     * @return self
     */
    public function withCurrent(CurrentConfiguration $current): self
    {
        $this->current = $current;
        return $this;
    }

    public function build(): ViewportConfiguration
    {
        return ($this->constructor)(
            $this->current
        );
    }
}
