<?php

namespace Alexa\Model\Services\ListManagement;

abstract class AlexaListItemBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $id = null;

    /** @var int|null */
    private $version = null;

    /** @var string|null */
    private $value = null;

    /** @var ListItemState|null */
    private $status = null;

    /** @var string|null */
    private $createdTime = null;

    /** @var string|null */
    private $updatedTime = null;

    /** @var string|null */
    private $href = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function withVersion(int $version): self
    {
        $this->version = $version;
        return $this;
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

    public function withCreatedTime(string $createdTime): self
    {
        $this->createdTime = $createdTime;
        return $this;
    }

    public function withUpdatedTime(string $updatedTime): self
    {
        $this->updatedTime = $updatedTime;
        return $this;
    }

    public function withHref(string $href): self
    {
        $this->href = $href;
        return $this;
    }

    public function build(): AlexaListItem
    {
        return ($this->constructor)(
            $this->id,
            $this->version,
            $this->value,
            $this->status,
            $this->createdTime,
            $this->updatedTime,
            $this->href
        );
    }
}
