<?php

namespace Alexa\Model\SLU\EntityResolution;

abstract class ResolutionBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $authority = null;

    /** @var Status|null */
    private $status = null;

    /** @var ValueWrapper[] */
    private $values = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $authority
     * @return self
     */
    public function withAuthority(string $authority): self
    {
        $this->authority = $authority;
        return $this;
    }

    /**
     * @param Status $status
     * @return self
     */
    public function withStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param array $values
     * @return self
     */
    public function withValues(array $values): self
    {
        foreach ($values as $element) {
            assert($element instanceof ValueWrapper);
        }
        $this->values = $values;
        return $this;
    }

    public function build(): Resolution
    {
        return ($this->constructor)(
            $this->authority,
            $this->status,
            $this->values
        );
    }
}
