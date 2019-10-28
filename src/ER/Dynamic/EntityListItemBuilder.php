<?php

namespace Alexa\Model\ER\Dynamic;

abstract class EntityListItemBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $name = null;

    /** @var Entity[] */
    private $values = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $name
     * @return self
     */
    public function withName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param array $values
     * @return self
     */
    public function withValues(array $values): self
    {
        foreach ($values as $element) {
            assert($element instanceof Entity);
        }
        $this->values = $values;
        return $this;
    }

    public function build(): EntityListItem
    {
        return ($this->constructor)(
            $this->name,
            $this->values
        );
    }
}
