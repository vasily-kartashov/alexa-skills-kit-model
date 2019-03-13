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
