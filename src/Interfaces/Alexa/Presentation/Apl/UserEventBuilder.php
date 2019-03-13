<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\Apl;

abstract class UserEventBuilder
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

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param mixed $token
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

    public function build(): UserEvent
    {
        return ($this->constructor)(
            $this->token,
            $this->arguments,
            $this->source,
            $this->components
        );
    }
}
