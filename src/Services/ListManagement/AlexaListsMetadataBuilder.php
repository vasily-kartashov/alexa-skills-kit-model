<?php

namespace Alexa\Model\Services\ListManagement;

abstract class AlexaListsMetadataBuilder
{
    /** @var callable */
    private $constructor;

    /** @var AlexaListMetadata[] */
    private $lists = [];

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param array $lists
     * @return self
     */
    public function withLists(array $lists): self
    {
        foreach ($lists as $element) {
            assert($element instanceof AlexaListMetadata);
        }
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
