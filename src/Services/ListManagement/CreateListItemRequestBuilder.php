<?php

namespace Alexa\Model\Services\ListManagement;

abstract class CreateListItemRequestBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $value = null;

    /** @var ListItemState|null */
    private $status = null;

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

    public function build(): CreateListItemRequest
    {
        return ($this->constructor)(
            $this->value,
            $this->status
        );
    }
}
