<?php

namespace Alexa\Model\Dialog;

use Alexa\Model\ER\Dynamic\EntityListItem;
use Alexa\Model\ER\Dynamic\UpdateBehavior;

abstract class DynamicEntitiesDirectiveBuilder
{
    /** @var callable */
    private $constructor;

    /** @var UpdateBehavior|null */
    private $updateBehavior = null;

    /** @var EntityListItem[] */
    private $types = [];

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param UpdateBehavior $updateBehavior
     * @return self
     */
    public function withUpdateBehavior(UpdateBehavior $updateBehavior): self
    {
        $this->updateBehavior = $updateBehavior;
        return $this;
    }

    /**
     * @param array $types
     * @return self
     */
    public function withTypes(array $types): self
    {
        foreach ($types as $element) {
            assert($element instanceof EntityListItem);
        }
        $this->types = $types;
        return $this;
    }

    public function build(): DynamicEntitiesDirective
    {
        return ($this->constructor)(
            $this->updateBehavior,
            $this->types
        );
    }
}
