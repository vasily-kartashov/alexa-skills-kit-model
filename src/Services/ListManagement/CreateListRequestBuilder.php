<?php

namespace Alexa\Model\Services\ListManagement;

abstract class CreateListRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $name = null;

    /** @var ListState|null */
    private $state = null;

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
     * @param ListState $state
     * @return self
     */
    public function withState(ListState $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function build(): CreateListRequest
    {
        return ($this->constructor)(
            $this->name,
            $this->state
        );
    }
}
