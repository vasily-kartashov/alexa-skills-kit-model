<?php

namespace Alexa\Model;

abstract class TaskBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $name = null;

    /** @var string|null */
    private $version = null;

    /** @var mixed|null */
    private $input = null;

    protected function __construct(callable $constructor)
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
     * @param string $version
     * @return self
     */
    public function withVersion(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @param mixed $input
     * @return self
     */
    public function withInput($input): self
    {
        $this->input = $input;
        return $this;
    }

    public function build(): Task
    {
        return ($this->constructor)(
            $this->name,
            $this->version,
            $this->input
        );
    }
}
