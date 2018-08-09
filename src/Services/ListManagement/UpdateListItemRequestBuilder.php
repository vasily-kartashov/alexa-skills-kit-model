<?php

namespace Alexa\Model\Services\ListManagement;

abstract class UpdateListItemRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $value = null;

    /** @var ListItemState|null */
    private $status = null;

    /** @var int|null */
    private $version = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function withStatus(ListItemState $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function withVersion(int $version): self
    {
        $this->version = $version;
        return $this;
    }

    public function build(): UpdateListItemRequest
    {
        return ($this->constructor)(
            $this->value,
            $this->status,
            $this->version
        );
    }
}
