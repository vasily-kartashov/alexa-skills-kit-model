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

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function withState(ListState $state): self
    {
        $this->state = $state;
        return $this;
    }

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
