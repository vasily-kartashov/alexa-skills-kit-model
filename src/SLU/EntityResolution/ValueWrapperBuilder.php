<?php

namespace Alexa\Model\SLU\EntityResolution;

abstract class ValueWrapperBuilder
{
    /** @var callable */
    private $constructor;

    /** @var Value|null */
    private $value = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $value
     * @return self
     */
    public function withValue(Value $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function build(): ValueWrapper
    {
        return ($this->constructor)(
            $this->value
        );
    }
}
