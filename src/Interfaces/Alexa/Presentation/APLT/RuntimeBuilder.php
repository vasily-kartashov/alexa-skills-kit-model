<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

abstract class RuntimeBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $maxVersion = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $maxVersion
     * @return self
     */
    public function withMaxVersion(string $maxVersion): self
    {
        $this->maxVersion = $maxVersion;
        return $this;
    }

    public function build(): Runtime
    {
        return ($this->constructor)(
            $this->maxVersion
        );
    }
}
