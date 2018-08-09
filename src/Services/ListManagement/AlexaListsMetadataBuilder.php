<?php

namespace Alexa\Model\Services\ListManagement;

abstract class AlexaListsMetadataBuilder
{
    /** @var callable */
    private $constructor;

    /** @var AlexaListMetadata[] */
    private $lists = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param AlexaListMetadata[] $lists
     * @return self
     */
    public function withLists(array $lists): self
    {
        $this->lists = $lists;
        return $this;
    }

    public function build(): AlexaListsMetadata
    {
        return ($this->constructor)(
            $this->lists
        );
    }
}
