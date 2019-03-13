<?php

namespace Alexa\Model\Services\ListManagement;

abstract class ListBodyBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $listId = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $listId
     * @return self
     */
    public function withListId(string $listId): self
    {
        $this->listId = $listId;
        return $this;
    }

    public function build(): ListBody
    {
        return ($this->constructor)(
            $this->listId
        );
    }
}
