<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

abstract class AplUserEventBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $token = null;

    /** @var array */
    private $arguments = [];

    /** @var mixed|null */
    private $source = null;

    /** @var mixed|null */
    private $components = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $token
     * @return self
     */
    public function withToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @param array $arguments
     * @return self
     */
    public function withArguments(array $arguments): self
    {
        $this->arguments = $arguments;
        return $this;
    }

    /**
     * @param mixed $source
     * @return self
     */
    public function withSource($source): self
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @param mixed $components
     * @return self
     */
    public function withComponents($components): self
    {
        $this->components = $components;
        return $this;
    }

    public function build(): AplUserEvent
    {
        return ($this->constructor)(
            $this->token,
            $this->arguments,
            $this->source,
            $this->components
        );
    }
}
