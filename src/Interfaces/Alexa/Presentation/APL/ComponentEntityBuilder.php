<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class ComponentEntityBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $type = null;

    /** @var string|null */
    private $value = null;

    /** @var string|null */
    private $id = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $type
     * @return self
     */
    public function withType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $value
     * @return self
     */
    public function withValue(string $value): self
    {
        $this->value = $value;
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

    public function build(): ComponentEntity
    {
        return ($this->constructor)(
            $this->type,
            $this->value,
            $this->id
        );
    }
}
