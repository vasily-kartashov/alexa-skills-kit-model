<?php

namespace Alexa\Model\Services\ListManagement;

abstract class AlexaListBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $listId = null;

    /** @var string|null */
    private $name = null;

    /** @var ListState|null */
    private $state = null;

    /** @var int|null */
    private $version = null;

    /** @var AlexaListItem[] */
    private $items = [];

    /** @var Links|null */
    private $links = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    public function withListId(string $listId): self
    {
        $this->listId = $listId;
        return $this;
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

    /**
     * @param AlexaListItem[] $items
     * @return self
     */
    public function withItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }

    public function withLinks(Links $links): self
    {
        $this->links = $links;
        return $this;
    }

    public function build(): AlexaList
    {
        return ($this->constructor)(
            $this->listId,
            $this->name,
            $this->state,
            $this->version,
            $this->items,
            $this->links
        );
    }
}
