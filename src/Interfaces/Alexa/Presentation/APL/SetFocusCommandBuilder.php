<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class SetFocusCommandBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $componentId = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $componentId
     * @return self
     */
    public function withComponentId(string $componentId): self
    {
        $this->componentId = $componentId;
        return $this;
    }

    public function build(): SetFocusCommand
    {
        return ($this->constructor)(
            $this->componentId
        );
    }
}
