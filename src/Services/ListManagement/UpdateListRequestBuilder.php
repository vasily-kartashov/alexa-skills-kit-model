<?php

namespace Alexa\Model\Services\ListManagement;

abstract class UpdateListRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $name = null;

    /** @var ListState|null */
    private $state = null;

    /** @var int|null */
    private $version = null;

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
     * @param ListState $state
     * @return self
     */
    public function withState(ListState $state): self
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @param int $version
     * @return self
     */
    public function withVersion(int $version): self
    {
        $this->version = $version;
        return $this;
    }

    public function build(): UpdateListRequest
    {
        return ($this->constructor)(
            $this->name,
            $this->state,
            $this->version
        );
    }
}
