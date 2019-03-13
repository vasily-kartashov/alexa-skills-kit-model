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

    /**
     * @param mixed $value
     * @return self
     */
    public function withValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param mixed $status
     * @return self
     */
    public function withStatus(ListItemState $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param mixed $version
     * @return self
     */
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
