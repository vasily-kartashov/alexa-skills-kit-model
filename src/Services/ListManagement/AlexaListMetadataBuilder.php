<?php

namespace Alexa\Model\Services\ListManagement;

abstract class AlexaListMetadataBuilder
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

    /** @var Status[] */
    private $statusMap = [];

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
     * @param Status[] $statusMap
     * @return self
     */
    public function withStatusMap(array $statusMap): self
    {
        foreach ($statusMap as $element) {
            assert($element instanceof Status);
        }
        $this->statusMap = $statusMap;
        return $this;
    }

    public function build(): AlexaListMetadata
    {
        return ($this->constructor)(
            $this->listId,
            $this->name,
            $this->state,
            $this->version,
            $this->statusMap
        );
    }
}
