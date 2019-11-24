<?php

namespace Alexa\Model\Interfaces\CustomInterfaceController;

abstract class HeaderBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $namespace = null;

    /** @var string|null */
    private $name = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $namespace
     * @return self
     */
    public function withNamespace(string $namespace): self
    {
        $this->namespace = $namespace;
        return $this;
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

    public function build(): Header
    {
        return ($this->constructor)(
            $this->namespace,
            $this->name
        );
    }
}
