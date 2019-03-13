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

    /**
     * @param mixed $listId
     * @return self
     */
    public function withListId(string $listId): self
    {
        $this->listId = $listId;
        return $this;
    }

    /**
     * @param mixed $name
     * @return self
     */
    public function withName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $state
     * @return self
     */
    public function withState(ListState $state): self
    {
        $this->state = $state;
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

    /**
     * @param AlexaListItem[] $items
     * @return self
     */
    public function withItems(array $items): self
    {
        foreach ($items as $element) {
            assert($element instanceof AlexaListItem);
        }
        $this->items = $items;
        return $this;
    }

    /**
     * @param mixed $links
     * @return self
     */
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
