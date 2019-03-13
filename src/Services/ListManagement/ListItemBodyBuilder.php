<?php

namespace Alexa\Model\Services\ListManagement;

abstract class ListItemBodyBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $listId = null;

    /** @var string[] */
    private $listItemIds = [];

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
     * @param string[] $listItemIds
     * @return self
     */
    public function withListItemIds(array $listItemIds): self
    {
        foreach ($listItemIds as $element) {
            assert(is_string($element));
        }
        $this->listItemIds = $listItemIds;
        return $this;
    }

    public function build(): ListItemBody
    {
        return ($this->constructor)(
            $this->listId,
            $this->listItemIds
        );
    }
}
