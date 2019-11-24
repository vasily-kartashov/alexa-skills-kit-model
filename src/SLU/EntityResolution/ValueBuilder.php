<?php

namespace Alexa\Model\SLU\EntityResolution;

abstract class ValueBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $name = null;

    /** @var string|null */
    private $id = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $name
     * @return self
     */
    public function withName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $id
     * @return self
     */
    public function withId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function build(): Value
    {
        return ($this->constructor)(
            $this->name,
            $this->id
        );
    }
}
