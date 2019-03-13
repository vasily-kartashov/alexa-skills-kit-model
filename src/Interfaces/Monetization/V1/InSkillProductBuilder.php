<?php

namespace Alexa\Model\Interfaces\Monetization\V1;

abstract class InSkillProductBuilder
{
    /** @var callable */
    private $constructor;

    /** @var string|null */
    private $productId = null;

    protected function __construct(callable $constructor)
    {
        $this->constructor = $constructor;
    }

    /**
     * @param string $productId
     * @return self
     */
    public function withProductId(string $productId): self
    {
        $this->productId = $productId;
        return $this;
    }

    public function build(): InSkillProduct
    {
        return ($this->constructor)(
            $this->productId
        );
    }
}
