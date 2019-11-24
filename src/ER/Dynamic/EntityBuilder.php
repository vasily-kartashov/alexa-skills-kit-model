<?php

namespace Alexa\Model\ER\Dynamic;

abstract class EntityBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $id = null;

    /** @var EntityValueAndSynonyms|null */
    private $name = null;

    public function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $id
     * @return self
     */
    public function withId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param EntityValueAndSynonyms $name
     * @return self
     */
    public function withName(EntityValueAndSynonyms $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function build(): Entity
    {
        return ($this->constructor)(
            $this->id,
            $this->name
        );
    }
}
